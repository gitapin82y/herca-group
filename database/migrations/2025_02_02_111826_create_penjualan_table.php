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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_number')->unique();
            $table->date('date');
            $table->decimal('cargo_fee', 15, 2);
            $table->decimal('total_balance', 15, 2);
            $table->decimal('grand_total', 15, 2);
            $table->timestamps();
            $table->foreignId('marketing_id')->constrained('marketing')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
