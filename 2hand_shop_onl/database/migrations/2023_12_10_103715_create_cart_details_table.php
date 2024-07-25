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
        Schema::create('cart_details', function (Blueprint $table) {
            $table->string('cart_detail_id')->primary();
            $table->string('cart_id');
            $table->string('cloth_id');
            $table->integer('quantity');
            $table->boolean('is_choose');
            $table->decimal('sum_cost', 10, 2);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('cart_id')->references('cart_id')->on('cart_lists')->onDelete('cascade');
            $table->foreign('cloth_id')->references('cloth_id')->on('clothes')->onDelete('cascade');
        });

        DB::unprepared('
                CREATE TRIGGER generate_cart_detail_id BEFORE INSERT ON cart_details
                FOR EACH ROW
                BEGIN
                    IF NEW.cart_detail_id IS NULL OR NEW.cart_detail_id = \'\' THEN
                        SET NEW.cart_detail_id = CONCAT(\'CD\', LPAD((SELECT COALESCE(MAX(SUBSTRING(cart_detail_id, 3)) + 1, 1) FROM cart_details), 3, \'0\'));
                    END IF;
                END
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_details');
        DB::unprepared('DROP TRIGGER IF EXISTS generate_cart_detail_id');
    }
};
