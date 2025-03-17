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
        Schema::table('salaries', function (Blueprint $table) {
            // Remove the existing columns that you don't need anymore
            $table->dropColumn(['withdrawl', 'paid_salary']); // Remove the old salary columns
    
            // Add the new columns
            $table->decimal('fixed_salary', 10, 2)->after('staff_id'); // Add fixed salary
            $table->decimal('payable_salary', 10, 2)->after('fixed_salary'); // Add payable salary
    
            // Add new withdrawal column and paid salary
            $table->decimal('withdrawl', 10, 2)->default(0)->after('payable_salary'); // Amount withdrawn
            $table->decimal('paid_salary', 10, 2)->default(0)->after('withdrawl'); //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('salaries', function (Blueprint $table) {
            // Revert the changes made in the "up" method
            $table->dropColumn(['withdrawl', 'paid_salary']); // Remove withdrawal and paid salary
            $table->dropColumn(['fixed_salary', 'payable_salary']); // Remove fixed salary and payable salary
    
            // Recreate the previous columns
            $table->decimal('fixed_salary', 10, 2)->after('staff_id');
            $table->decimal('payable_salary', 10, 2)->after('fixed_salary');
        });
    }
};
