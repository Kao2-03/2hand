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
        Schema::create('list_clothes', function (Blueprint $table) {
            $table->string('cloth_id');
            $table->string('size_id');
            $table->integer('quantity');
            $table->primary(['cloth_id', 'size_id']);
            $table->timestamps();

            $table->foreign('cloth_id')->references('cloth_id')->on('clothes');
            $table->foreign('size_id')->references('size_id')->on('sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_clothes');
    }
};
