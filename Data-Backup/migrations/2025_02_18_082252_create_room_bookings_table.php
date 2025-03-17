<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('adults');
            $table->integer('kids');
            $table->integer('extra_bed');
            $table->string('status')->default('Not Allotted'); // status of booking
            $table->string('booked_by'); // admin or online
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_bookings');
    }
}
