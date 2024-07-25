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
        Schema::create('consigns', function (Blueprint $table) {
            $table->string('consign_id')->primary();
            $table->string('cus_id');
            $table->string('address_id');
            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->string('who_decide')->nullable();
            $table->text('info')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('cus_id')->references('cus_id')->on('customers')->onDelete('cascade');
            $table->foreign('address_id')->references('address_id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consigns');
    }
};
