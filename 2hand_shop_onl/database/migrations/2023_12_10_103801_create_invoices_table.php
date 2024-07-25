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
        Schema::create('invoices', function (Blueprint $table) {
            $table->string('invoice_id')->primary();
            $table->string('status');
            $table->string('address_id');
            $table->string('cus_id');
            $table->string('cou_id');
            $table->decimal('total_value', 10, 2);
            $table->string('pay_method');
            $table->dateTime('created_on');
            $table->boolean('is_pay');
            $table->string('cart_id');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('address_id')->references('address_id')->on('addresses')->onDelete('cascade');
            $table->foreign('cus_id')->references('cus_id')->on('customers')->onDelete('cascade');
            $table->foreign('cou_id')->references('cou_id')->on('coupons')->onDelete('cascade');
            $table->foreign('cart_id')->references('cart_id')->on('cart_lists')->onDelete('cascade');
        });

        DB::unprepared('
                CREATE TRIGGER generate_invoices_id BEFORE INSERT ON invoices
                FOR EACH ROW
                BEGIN
                    IF NEW.invoice_id IS NULL OR NEW.invoice_id = \'\' THEN
                        SET NEW.invoice_id = CONCAT(\'I\', LPAD((SELECT COALESCE(MAX(SUBSTRING(invoice_id, 3)) + 1, 1) FROM invoices), 3, \'0\'));
                    END IF;
                END
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
        DB::unprepared('DROP TRIGGER IF EXISTS  generate_invoices_id');
    }
};
