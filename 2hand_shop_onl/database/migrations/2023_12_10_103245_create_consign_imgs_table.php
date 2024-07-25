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
        Schema::create('consign_imgs', function (Blueprint $table) {
            $table->id('cons_img_id');
            $table->string('img')->nullable();
            $table->string('consign_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('consign_id')->references('consign_id')->on('consigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consign_imgs');
    }
};
