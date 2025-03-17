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
        Schema::create('booking_room', function (Blueprint $table) {
            $table->id();
            $table->foreignId('online_booking_id')
                  ->constrained('online_bookings')
                  ->onDelete('cascade');
            $table->foreignId('room_id')
                  ->constrained('rooms')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_room');
    }
};
