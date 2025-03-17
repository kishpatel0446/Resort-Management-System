<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupiedRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('occupied_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->date('check_in');
            $table->date('check_out');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('occupied_rooms');
    }
}
