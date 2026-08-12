<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dip_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('registration_number')->unique();
            $table->enum('category', ['berkala', 'serta-merta', 'setiap-saat', 'dikecualikan'])->default('berkala');
            $table->integer('year');
            $table->string('file_size')->default('1.5 MB');
            $table->string('file_path')->nullable();
            $table->integer('downloads_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dip_documents');
    }
};
