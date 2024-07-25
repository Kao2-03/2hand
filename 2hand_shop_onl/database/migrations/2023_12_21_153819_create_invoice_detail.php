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
        Schema::create('invoice_detail', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->string('cloth_id');
            $table->integer('quantity');
            $table->decimal('sum_cost', 10, 2);
            $table->timestamps();
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('cascade');
            $table->foreign('cloth_id')->references('cloth_id')->on('clothes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_detail');
    }
};
