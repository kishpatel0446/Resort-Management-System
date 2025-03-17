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
        Schema::create('admin_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');  
            $table->string('name');                 
            $table->string('cn');                   
            $table->string('acn')->nullable();     
            $table->date('date');                  
            $table->time('time');                 
            $table->integer('kids');               
            $table->integer('adults');              
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admin_bookings');
    }
};
