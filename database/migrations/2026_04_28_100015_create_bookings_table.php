<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('vehicle_id');

            $table->string('nama_penyewa');
            $table->string('no_hp');

            $table->date('tgl_sewa');
            $table->date('tgl_kembali');

            $table->bigInteger('total_harga')->nullable();

            $table->string('status')->default('Booking');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};