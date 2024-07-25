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
        Schema::create('cart_lists', function (Blueprint $table) {
            $table->string('cart_id')->primary();
            $table->string('cus_id');
            $table->decimal('total', 10, 2)->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('cus_id')->references('cus_id')->on('customers')->onDelete('cascade');
        });

        DB::unprepared('
                CREATE TRIGGER generate_cart_list_id BEFORE INSERT ON cart_lists
                FOR EACH ROW
                BEGIN
                    IF NEW.cart_id IS NULL OR NEW.cart_id = \'\' THEN
                        SET NEW.cart_id = CONCAT(\'CL\', LPAD((SELECT COALESCE(MAX(SUBSTRING(cart_id, 3)) + 1, 1) FROM cart_lists), 3, \'0\'));
                    END IF;
                END
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_lists');
        DB::unprepared('DROP TRIGGER IF EXISTS generate_cart_list_id');
    }
};
