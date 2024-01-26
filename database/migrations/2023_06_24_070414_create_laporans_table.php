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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tanggalpembayaran');
            //$table->string('Lembaga');
            $table->integer('jumlah_pembayaran');
            $table->string('bulanbayar');
            $table->string('file_bukti');
            $table->timestamps();
            $table->string('status')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
