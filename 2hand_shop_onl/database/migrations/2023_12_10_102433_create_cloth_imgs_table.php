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
        Schema::create('cloth_imgs', function (Blueprint $table) {
            $table->id('img_id');
            $table->string('img')->nullable();
            $table->string('cloth_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('cloth_id')->references('cloth_id')->on('clothes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cloth_imgs');
    }
};
