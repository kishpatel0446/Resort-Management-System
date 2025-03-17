<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Name of the booking
            $table->string('cn'); // Customer number
            $table->string('acn'); // Alternate contact number
            $table->date('date'); // Booking date
            $table->time('time'); // Booking time
            $table->integer('kids'); // Number of kids
            $table->integer('adults'); // Number of adults
            // Add more columns as needed, based on your model
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
