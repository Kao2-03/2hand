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
        Schema::create('wards', function (Blueprint $table) {
            $table->string('code', 20)->primary();
            $table->string('name')->nullable();
            $table->string('name_en')->nullable();
            $table->string('full_name')->nullable();
            $table->string('full_name_en')->nullable();
            $table->string('code_name')->nullable();
            $table->string('district_code', 20)->nullable();
            $table->unsignedBigInteger('administrative_unit_id')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('district_code')->references('code')->on('districts');
            $table->foreign('administrative_unit_id')->references('id')->on('administrative_units');

            $table->index('district_code', 'idx_wards_district');
            $table->index('administrative_unit_id', 'idx_wards_unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wards');

        Schema::table('wards', function (Blueprint $table) {
            // Drop the indexes if needed
            $table->dropIndex('idx_wards_district');
            $table->dropIndex('idx_wards_unit');
        });
    }
};
