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
        Schema::create('bills', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->string('contact_no');
        $table->date('booking_date');
        $table->string('time_slot');
        $table->integer('kids');
        $table->decimal('rate_kids', 8, 2);
        $table->decimal('total_kids', 8, 2);
        $table->integer('adults');
        $table->decimal('rate_adults', 8, 2);
        $table->decimal('total_adults', 8, 2);
        $table->decimal('total_amount', 8, 2);
        $table->decimal('discount', 8, 2);
        $table->decimal('net_amount', 8, 2);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
