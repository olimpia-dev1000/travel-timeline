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
        Schema::create('financial_expenses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('expenses_categories_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('travel_id')->constrained('travels')->onDelete('cascade');
            $table->decimal('amount', total: 8, places: 2);
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_expenses');
    }
};
