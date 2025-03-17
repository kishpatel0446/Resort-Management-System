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
        Schema::create('school_booking', function (Blueprint $table) {
            $table->id();
            $table->string('sname');
            $table->string('addr');
            $table->string('cn');
            $table->date('date');
            $table->string('time');
            $table->integer('stud')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_school_booking');
    }
};
