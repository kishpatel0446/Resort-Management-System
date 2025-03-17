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
        Schema::create('agent_booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade'); // References the admin table
            $table->string('agentname');
            $table->string('cn');
            $table->string('acn')->nullable();
            $table->date('date');
            $table->string('time');
            $table->integer('kids')->default(0);
            $table->integer('adults')->default(0);
            $table->decimal('kids_rate', 8, 2)->default(0.00);
            $table->decimal('adults_rate', 8, 2)->default(0.00);
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->decimal('discount', 8, 2)->default(0.00);
            $table->decimal('netamount', 10, 2)->default(0.00);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_booking');
    }
};
