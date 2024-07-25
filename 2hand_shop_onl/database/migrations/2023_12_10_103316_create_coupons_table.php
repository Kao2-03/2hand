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
        Schema::create('coupons', function (Blueprint $table) {
            $table->string('cou_id')->primary();
            $table->dateTime('start_on')->nullable();
            $table->dateTime('end_on')->nullable();
            $table->decimal('min_invoice_value', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('code')->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->index('cou_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
