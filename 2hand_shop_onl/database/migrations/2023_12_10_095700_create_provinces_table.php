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
        Schema::create('provinces', function (Blueprint $table) {
            $table->string('code', 20)->primary();
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('full_name')->nullable();
            $table->string('full_name_en')->nullable();
            $table->string('code_name')->nullable();
            $table->unsignedBigInteger('administrative_unit_id')->nullable();
            $table->unsignedBigInteger('administrative_region_id')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('administrative_unit_id')->references('id')->on('administrative_units');
            $table->foreign('administrative_region_id')->references('id')->on('administrative_regions');

            $table->index('administrative_region_id', 'idx_provinces_region');
            $table->index('administrative_unit_id', 'idx_provinces_unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');

        Schema::table('provinces', function (Blueprint $table) {
            // Drop the indexes if needed
            $table->dropIndex('idx_provinces_region');
            $table->dropIndex('idx_provinces_unit');
        });
    }
};
