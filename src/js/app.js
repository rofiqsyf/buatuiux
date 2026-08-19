import { initStorage, getVisitorStats, findTicket, saveTicket, saveContactMessage, getProducts, getDipDocuments, getRegulations, getNews, getTickets } from './storage.js';

// Initialize storage on load
document.addEventListener('DOMContentLoaded', () => {
    initStorage();
    updateVisitorStatsUI();
    initGlobalHandlers();
    renderHomeFeaturedProducts();
    renderHomeLatestNews();
});

// Visitor Stats UI Updater
function updateVisitorStatsUI() {
    const stats = getVisitorStats();
    const elOnline = document.getElementById('statVisitorOnline');
    const elToday = document.getElementById('statVisitorToday');
    const elMonth = document.getElementById('statVisitorMonth');
    const elTotal = document.getElementById('statVisitorTotal');

    if (elOnline) elOnline.textContent = new Intl.NumberFormat('id-ID').format(stats.online);
    if (elToday) elToday.textContent = new Intl.NumberFormat('id-ID').format(stats.today);
    if (elMonth) elMonth.textContent = new Intl.NumberFormat('id-ID').format(stats.month);
    if (elTotal) elTotal.textContent = new Intl.NumberFormat('id-ID').format(stats.total);
}

// Global Event Listeners & Functions
function initGlobalHandlers() {
    // Expose handlers to window object for inline onclick attributes
    window.toggleMobileMenu = function() {
        const menu = document.getElementById('mobileMenu');
        const iconClosed = document.getElementById('mobileMenuIconClosed');
        const iconOpen = document.getElementById('mobileMenuIconOpen');
        if (menu) {
            const isHidden = menu.classList.contains('hidden');
            if (isHidden) {
                menu.classList.remove('hidden');
                if (iconClosed) iconClosed.classList.add('hidden');
                if (iconOpen) iconOpen.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
                if (iconClosed) iconClosed.classList.remove('hidden');
                if (iconOpen) iconOpen.classList.add('hidden');
            }
        }
    };

    window.toggleMobileSubmenu = function(id) {
        const el = document.getElementById(id);
        const arrow = document.getElementById(id + 'Arrow');
        if (el) {
            el.classList.toggle('hidden');
            if (arrow) arrow.classList.toggle('rotate-180');
        }
    };

    // Tracking Modal Handlers
    window.openTrackingModal = function(ticketNum = '') {
        const modal = document.getElementById('trackingModal');
        const input = document.getElementById('modalTicketInput');
        if (modal) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            if (input && ticketNum) input.value = ticketNum;
        }
    };

    window.closeTrackingModal = function() {
        const modal = document.getElementById('trackingModal');
        const resDiv = document.getElementById('trackingResult');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        if (resDiv) resDiv.classList.add('hidden');
    };

    window.submitTracking = function(e) {
        if (e) e.preventDefault();
        const input = document.getElementById('modalTicketInput');
        const resDiv = document.getElementById('trackingResult');
        if (!input || !resDiv) return;

        const ticketNum = input.value.trim();
        resDiv.classList.remove('hidden');
        resDiv.className = "mt-4 p-4 rounded-xl border bg-slate-50 border-slate-200 text-slate-600 text-center text-xs animate-pulse";
        resDiv.innerHTML = "Memeriksa database permohonan...";

        setTimeout(() => {
            const data = findTicket(ticketNum);

            if (data) {
                resDiv.className = "mt-4 p-4 rounded-xl border border-teal-200 bg-teal-50/60 text-slate-700 text-xs space-y-2 text-left animate-fade-in";
                resDiv.innerHTML = `
                    <div class="flex justify-between items-center border-b border-teal-200/60 pb-2">
                        <span class="font-mono font-bold text-teal-700">#${data.ticket_number}</span>
                        <span class="bg-teal-600 text-white font-bold text-[10px] px-2.5 py-0.5 rounded-full uppercase">${data.status_label || data.status}</span>
                    </div>
                    <div><strong class="text-slate-800">Pemohon:</strong> ${data.name}</div>
                    <div><strong class="text-slate-800">Tahapan:</strong> ${data.stage}</div>
                    <div><strong class="text-slate-800">Estimasi Selesai:</strong> ${data.estimate}</div>
                    ${data.response_notes ? `<div class="mt-2 p-2.5 bg-white rounded-lg border border-teal-100 text-xs text-slate-600"><strong>Catatan Petugas:</strong> ${data.response_notes}</div>` : ''}
                `;
            } else {
                resDiv.className = "mt-4 p-4 rounded-xl border border-rose-200 bg-rose-50 text-rose-700 text-xs text-center font-medium animate-fade-in";
                resDiv.innerHTML = `Nomor tiket <strong>${ticketNum}</strong> tidak ditemukan. Silakan periksa kembali format nomor tiket Anda.`;
            }
        }, 300);
    };

    // Product Modal Handlers
    let currentProduct = null;

    window.openProductDetailModal = function(product) {
        if (typeof product === 'string') {
            try { product = JSON.parse(product); } catch(e) {}
        }
        currentProduct = product;
        const modal = document.getElementById('productDetailModal');
        if (!modal || !product) return;

        document.getElementById('pModalName').innerText = product.name;
        document.getElementById('pModalBrand').innerText = product.brand || 'PT Bhakti Husada';
        document.getElementById('pModalCatBadge').innerText = product.category_label || product.category;
        document.getElementById('pModalPrice').innerText = product.price_formatted || `Rp ${new Intl.NumberFormat('id-ID').format(product.price)}`;
        document.getElementById('pModalUnit').innerText = 'per ' + (product.unit || 'unit');
        document.getElementById('pModalAvailBadge').innerText = product.availability_label || product.availability;
        document.getElementById('pModalDesc').innerText = product.description;

        document.getElementById('pModalQtyInput').value = 1;
        document.getElementById('pModalBuyerName').value = '';
        document.getElementById('pModalNote').value = '';

        // Render Specification
        const specDiv = document.getElementById('pModalSpec');
        if (product.specification && product.specification !== '-') {
            const parts = product.specification.split('|');
            specDiv.innerHTML = parts.map(p => `<div class="flex items-center gap-1.5"><span class="text-teal-600 font-bold">✓</span> ${p.trim()}</div>`).join('');
        } else {
            specDiv.innerHTML = '<span class="text-slate-400 italic">Tidak ada spesifikasi khusus.</span>';
        }

        // Render Variant Pills
        const pillsDiv = document.getElementById('pModalVariantPills');
        pillsDiv.innerHTML = '';
        const variants = ['Standard / Box', 'Kemasan Hemat', 'Paket Instansi'];
        variants.forEach((v, idx) => {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = `px-3 py-1.5 rounded-xl text-xs font-semibold border transition ${idx === 0 ? 'bg-teal-600 text-white border-teal-600 shadow-sm' : 'bg-white text-slate-700 border-slate-200 hover:border-teal-500'}`;
            btn.innerText = v;
            btn.onclick = () => {
                Array.from(pillsDiv.children).forEach(c => c.className = 'px-3 py-1.5 rounded-xl text-xs font-semibold border bg-white text-slate-700 border-slate-200 hover:border-teal-500 transition');
                btn.className = 'px-3 py-1.5 rounded-xl text-xs font-semibold border bg-teal-600 text-white border-teal-600 shadow-sm transition';
                document.getElementById('pModalSelectedVariant').value = v;
                updateWaLink();
            };
            pillsDiv.appendChild(btn);
        });

        calculateModalTotal();
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    };

    window.closeProductDetailModal = function() {
        const modal = document.getElementById('productDetailModal');
        if (modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    };

    window.updateModalQty = function(delta) {
        const input = document.getElementById('pModalQtyInput');
        if (!input) return;
        let qty = parseInt(input.value) || 1;
        qty = Math.max(1, qty + delta);
        input.value = qty;
        calculateModalTotal();
    };

    window.calculateModalTotal = function() {
        if (!currentProduct) return;
        const qty = parseInt(document.getElementById('pModalQtyInput').value) || 1;
        const total = currentProduct.price * qty;
        document.getElementById('pModalSubtotal').innerText = `Rp ${new Intl.NumberFormat('id-ID').format(total)}`;
        updateWaLink();
    };

    window.updateWaLink = function() {
        if (!currentProduct) return;
        const qty = document.getElementById('pModalQtyInput').value || 1;
        const variant = document.getElementById('pModalSelectedVariant').value || 'Standard';
        const buyer = document.getElementById('pModalBuyerName').value || 'Tanpa Nama';
        const note = document.getElementById('pModalNote').value || '-';
        const total = `Rp ${new Intl.NumberFormat('id-ID').format(currentProduct.price * qty)}`;

        const message = `Halo Admin PT Bhakti Husada Wonosobo,\nSaya ingin memesan produk berikut:\n\n📌 *Produk:* ${currentProduct.name}\n🏷️ *Varian:* ${variant}\n🔢 *Jumlah:* ${qty} ${currentProduct.unit}\n💰 *Total Estimasi:* ${total}\n👤 *Pemesan:* ${buyer}\n📝 *Catatan:* ${note}\n\nMohon konfirmasi ketersediaan stok dan prosedur pengiriman. Terima kasih!`;

        const encoded = encodeURIComponent(message);
        document.getElementById('pModalWaBtn').href = `https://wa.me/6281234567890?text=${encoded}`;
    };
}

// Render Featured Products on Homepage
function renderHomeFeaturedProducts() {
    const container = document.getElementById('homeFeaturedProducts');
    if (!container) return;

    const products = getProducts().slice(0, 4);
    container.innerHTML = products.map(p => `
        <div class="bg-white rounded-3xl border border-slate-200/90 p-5 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 group flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between gap-2 mb-3">
                    <span class="text-[10px] font-extrabold px-2.5 py-0.5 rounded-full bg-teal-50 text-teal-700 border border-teal-100">${p.category_label || p.category}</span>
                    ${p.is_featured_badge ? `<span class="text-[10px] font-extrabold px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800">${p.is_featured_badge}</span>` : ''}
                </div>

                <div class="w-full h-44 rounded-2xl overflow-hidden bg-slate-50 mb-4 border border-slate-100 flex items-center justify-center p-2 group-hover:scale-105 transition duration-300 relative">
                    ${p.image_url ? 
                        `<img src="${p.image_url}" alt="${p.name}" class="w-full h-full object-contain">` :
                        `<div class="w-full h-full bg-gradient-to-br from-teal-900 via-teal-800 to-slate-900 rounded-xl flex flex-col items-center justify-center text-teal-200 p-4 text-center">
                            <svg class="w-8 h-8 text-teal-300/80 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            <span class="text-[10px] font-bold uppercase tracking-widest block text-teal-100">${p.brand || 'BHW Medical'}</span>
                        </div>`
                    }
                </div>

                <div class="space-y-1 mb-2">
                    <span class="text-[10px] font-extrabold text-teal-700 uppercase tracking-wider block">${p.brand || 'PT Bhakti Husada'}</span>
                    <h3 class="font-heading font-bold text-slate-800 text-base leading-snug hover:text-teal-600 transition cursor-pointer" onclick='openProductDetailModal(${JSON.stringify(p)})'>
                        ${p.name}
                    </h3>
                </div>

                <p class="text-[11px] text-slate-400 font-medium line-clamp-1 mb-4">${p.specification || p.description}</p>
            </div>

            <div class="pt-3 border-t border-slate-100 space-y-3">
                <div class="flex items-baseline justify-between">
                    <div>
                        <span class="text-[10px] text-slate-400 font-semibold block mb-0.5">Harga Satuan</span>
                        <span class="font-heading font-extrabold text-teal-700 text-lg">${p.price_formatted || 'Rp ' + p.price}</span>
                    </div>
                    <span class="text-[10px] font-extrabold px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800">
                        ${p.availability_label || 'Tersedia'} / ${p.unit || 'unit'}
                    </span>
                </div>

                <button type="button" onclick='openProductDetailModal(${JSON.stringify(p)})' class="w-full text-center py-2.5 px-3.5 bg-slate-50 hover:bg-teal-50 text-teal-700 text-xs font-bold rounded-xl border border-slate-200 hover:border-teal-200 transition flex items-center justify-between group-hover:bg-teal-600 group-hover:text-white group-hover:border-teal-600">
                    <span>👁 Buka Pilihan Pemesanan</span>
                    <svg class="w-4 h-4 transition transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    `).join('');
}

// Render Latest News on Homepage
function renderHomeLatestNews() {
    const container = document.getElementById('homeLatestNews');
    if (!container) return;

    const newsList = getNews().slice(0, 2);
    container.innerHTML = newsList.map(n => `
        <article class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition flex flex-col group">
            <div class="w-full h-56 bg-slate-100 relative overflow-hidden">
                ${n.image_url ? 
                    `<img src="${n.image_url}" alt="${n.title}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">` :
                    `<div class="w-full h-full bg-gradient-to-br from-teal-900 via-teal-800 to-slate-900 flex items-center justify-center text-teal-200 p-6 text-center">
                        <div class="space-y-2">
                            <svg class="w-10 h-10 mx-auto text-teal-400 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            <span class="text-xs font-bold uppercase tracking-widest block text-teal-300">PT Bhakti Husada Wonosobo</span>
                        </div>
                    </div>`
                }
            </div>

            <div class="p-7 flex-grow space-y-3.5">
                <div class="flex items-center gap-3 text-xs text-slate-400">
                    <span class="bg-teal-50 text-teal-700 border border-teal-100 font-bold px-3 py-1 rounded-full text-[11px]">${n.category}</span>
                    <span>${n.published_at}</span>
                </div>
                <h3 class="font-heading font-extrabold text-slate-800 text-xl leading-snug group-hover:text-teal-600 transition">
                    <a href="/berita-detail.html?id=${n.id}">${n.title}</a>
                </h3>
                <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">${n.summary}</p>
            </div>

            <div class="px-7 py-4 bg-slate-50 border-t border-slate-100 flex justify-between items-center text-xs">
                <a href="/berita-detail.html?id=${n.id}" class="font-bold text-teal-600 hover:text-teal-700 flex items-center gap-1.5 group">
                    <span>Baca Selengkapnya</span>
                    <svg class="w-4 h-4 text-teal-600 transition transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </article>
    `).join('');
}
