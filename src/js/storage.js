/**
 * Local Storage Engine for PT Bhakti Husada Wonosobo Frontend Application
 */

import {
    INITIAL_PRODUCTS,
    INITIAL_DIP_DOCUMENTS,
    INITIAL_REGULATIONS,
    INITIAL_NEWS,
    INITIAL_TICKETS
} from '../data/mockData.js';

const STORAGE_KEYS = {
    TICKETS: 'bhw_ppid_tickets',
    MESSAGES: 'bhw_ppid_messages',
    VISITOR_STATS: 'bhw_ppid_visitor_stats',
    PRODUCTS: 'bhw_ppid_products',
    DIP_DOCS: 'bhw_ppid_dip_docs',
};

// Initialize Storage with defaults if empty
export function initStorage() {
    if (!localStorage.getItem(STORAGE_KEYS.TICKETS)) {
        localStorage.setItem(STORAGE_KEYS.TICKETS, JSON.stringify(INITIAL_TICKETS));
    }
    if (!localStorage.getItem(STORAGE_KEYS.PRODUCTS)) {
        localStorage.setItem(STORAGE_KEYS.PRODUCTS, JSON.stringify(INITIAL_PRODUCTS));
    }
    if (!localStorage.getItem(STORAGE_KEYS.DIP_DOCS)) {
        localStorage.setItem(STORAGE_KEYS.DIP_DOCS, JSON.stringify(INITIAL_DIP_DOCUMENTS));
    }
    if (!localStorage.getItem(STORAGE_KEYS.MESSAGES)) {
        localStorage.setItem(STORAGE_KEYS.MESSAGES, JSON.stringify([]));
    }

    // Initialize or update visitor stats counter
    initVisitorStats();
}

// Visitor Counter Manager
function initVisitorStats() {
    let stats = JSON.parse(localStorage.getItem(STORAGE_KEYS.VISITOR_STATS));
    if (!stats) {
        stats = {
            online: Math.floor(Math.random() * 5) + 3,
            today: Math.floor(Math.random() * 20) + 42,
            month: Math.floor(Math.random() * 200) + 1280,
            total: Math.floor(Math.random() * 500) + 15420,
            lastVisit: Date.now()
        };
    } else {
        // Increment visitor counters dynamically
        stats.today += 1;
        stats.month += 1;
        stats.total += 1;
        stats.online = Math.floor(Math.random() * 6) + 3;
    }
    localStorage.setItem(STORAGE_KEYS.VISITOR_STATS, JSON.stringify(stats));
}

export function getVisitorStats() {
    const stats = JSON.parse(localStorage.getItem(STORAGE_KEYS.VISITOR_STATS));
    return stats || { online: 5, today: 48, month: 1320, total: 15480 };
}

// Tickets Management
export function getTickets() {
    return JSON.parse(localStorage.getItem(STORAGE_KEYS.TICKETS)) || [];
}

export function findTicket(ticketNumber) {
    const tickets = getTickets();
    const cleanNum = ticketNumber.trim().toUpperCase();
    return tickets.find(t => t.ticket_number.toUpperCase() === cleanNum);
}

export function saveTicket(ticketData) {
    const tickets = getTickets();
    const now = new Date();
    const formattedDate = `${now.getDate()} ${now.toLocaleString('id-ID', { month: 'long' })} ${now.getFullYear()}`;
    const randomSuffix = Math.random().toString(36).substring(2, 6).toUpperCase();
    const ticketNumber = `REQ-${now.getFullYear()}${String(now.getMonth() + 1).padStart(2, '0')}${String(now.getDate()).padStart(2, '0')}-${randomSuffix}`;

    const newTicket = {
        ticket_number: ticketNumber,
        name: ticketData.name || 'Pemohon',
        nik: ticketData.nik || '-',
        email: ticketData.email || '-',
        phone: ticketData.phone || '-',
        address: ticketData.address || '-',
        information_requested: ticketData.information_requested || '-',
        purpose: ticketData.purpose || '-',
        status: 'processing',
        status_label: 'Sedang Diproses',
        stage: 'Verifikasi Dokumen Sekretariat',
        estimate: '3-5 Hari Kerja',
        created_at: formattedDate,
        response_notes: 'Permohonan berhasil dikirim dan tersimpan dalam database PPID.',
    };

    tickets.unshift(newTicket);
    localStorage.setItem(STORAGE_KEYS.TICKETS, JSON.stringify(tickets));
    return newTicket;
}

export function updateTicketStatus(ticketNumber, newStatus, responseNotes = '') {
    const tickets = getTickets();
    const ticket = tickets.find(t => t.ticket_number === ticketNumber);
    if (ticket) {
        ticket.status = newStatus;
        if (newStatus === 'approved') {
            ticket.status_label = 'Disetujui';
            ticket.stage = 'Dokumen Siap / Dikirim';
            ticket.estimate = 'Selesai';
        } else if (newStatus === 'rejected') {
            ticket.status_label = 'Ditolak';
            ticket.stage = 'Diarsipkan';
            ticket.estimate = 'Selesai';
        } else {
            ticket.status_label = 'Sedang Diproses';
            ticket.stage = 'Verifikasi Dokumen';
            ticket.estimate = '3-5 Hari Kerja';
        }
        if (responseNotes) ticket.response_notes = responseNotes;
        localStorage.setItem(STORAGE_KEYS.TICKETS, JSON.stringify(tickets));
    }
}

// Products Management
export function getProducts() {
    return JSON.parse(localStorage.getItem(STORAGE_KEYS.PRODUCTS)) || INITIAL_PRODUCTS;
}

// DIP Documents Management
export function getDipDocuments() {
    return JSON.parse(localStorage.getItem(STORAGE_KEYS.DIP_DOCS)) || INITIAL_DIP_DOCUMENTS;
}

// Regulations
export function getRegulations() {
    return INITIAL_REGULATIONS;
}

// News
export function getNews() {
    return INITIAL_NEWS;
}

// Contact Messages Management
export function saveContactMessage(msgData) {
    const messages = JSON.parse(localStorage.getItem(STORAGE_KEYS.MESSAGES)) || [];
    const newMsg = {
        id: Date.now(),
        name: msgData.name,
        email: msgData.email,
        phone: msgData.phone,
        topic: msgData.topic || 'Umum',
        message: msgData.message,
        created_at: new Date().toLocaleDateString('id-ID'),
    };
    messages.unshift(newMsg);
    localStorage.setItem(STORAGE_KEYS.MESSAGES, JSON.stringify(messages));
    return newMsg;
}
