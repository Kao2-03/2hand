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
        Schema::create('reviews', function (Blueprint $table) {
            $table->string('review_id')->primary();
            $table->string('cus_id');
            $table->string('cloth_id');
            $table->integer('rate');
            $table->text('comment')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('cus_id')->references('cus_id')->on('customers')->onDelete('cascade');
            $table->foreign('cloth_id')->references('cloth_id')->on('clothes')->onDelete('cascade');
        });

        DB::unprepared('
            CREATE TRIGGER generate_review_id BEFORE INSERT ON reviews
            FOR EACH ROW
            BEGIN
                IF NEW.review_id IS NULL OR NEW.review_id = \'\' THEN
                    SET NEW.review_id = CONCAT(\'R\', LPAD((SELECT COALESCE(MAX(SUBSTRING(review_id, 3)) + 1, 1) FROM reviews), 3, \'0\'));
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
        DB::unprepared('DROP TRIGGER IF EXISTS  generate_review_id');
    }
};
