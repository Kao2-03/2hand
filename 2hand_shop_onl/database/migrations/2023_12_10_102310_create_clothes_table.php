<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clothes', function (Blueprint $table) {
            $table->string('cloth_id')->primary();
            $table->string('cloth_name')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->integer('stock')->nullable();
            $table->string('category_id');
            $table->decimal('avg_rate', 5, 2)->nullable();
            $table->string('brand')->nullable();
            $table->string('origin')->nullable();
            $table->integer('purchase_quantity')->nullable();
            $table->text('description')->nullable();
            $table->string('forGender')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
        });

        DB::unprepared('
            CREATE TRIGGER generate_cloth_id BEFORE INSERT ON clothes
            FOR EACH ROW
            BEGIN
                IF NEW.cloth_id IS NULL OR NEW.cloth_id = \'\' THEN
                    SET NEW.cloth_id = CONCAT(\'C\', LPAD((SELECT COALESCE(MAX(SUBSTRING(cloth_id, 3)) + 1, 1) FROM clothes), 3, \'0\'));
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothes');
        DB::unprepared('DROP TRIGGER IF EXISTS generate_cloth_id');
    }
};
