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
        Schema::create('kitchen_purchase_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kitchen_purchase_id')->constrained()->onDelete('cascade');
            $table->string('item_name');
            $table->decimal('rate', 10, 2);
            $table->integer('qty'); 
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitchen_purchase_items');
    }
};
