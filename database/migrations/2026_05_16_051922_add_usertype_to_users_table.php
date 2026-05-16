<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Tambahkan kolom 'usertype' ke tabel users.
     *
     * Nilai default: 'user'
     * Nilai admin  : 'admin'
     *
     * Cara menjalankan:
     *   php artisan migrate
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambahkan setelah kolom 'email'
            $table->string('usertype')->default('user')->after('email');
        });
    }

    /**
     * Rollback: hapus kolom 'usertype' dari tabel users.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('usertype');
        });
    }
};