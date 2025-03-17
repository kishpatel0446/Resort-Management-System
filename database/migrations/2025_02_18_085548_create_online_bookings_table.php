<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('online_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('adults');
            $table->integer('kids');
            $table->integer('extra_bed')->default(0);
            $table->integer('num_rooms');
            $table->foreignId('room_id')->nullable()->constrained('rooms')->onDelete('set null');
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('online_bookings');
    }
}
