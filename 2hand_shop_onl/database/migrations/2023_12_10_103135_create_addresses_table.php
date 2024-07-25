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
        Schema::create('addresses', function (Blueprint $table) {
            $table->string('address_id')->primary();
            $table->string('cus_id');
            $table->string('province_code', 20)->nullable();
            $table->string('district_code', 20)->nullable();
            $table->string('ward_code', 20)->nullable();
            $table->string('address_detail')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('cus_id')->references('cus_id')->on('customers')->onDelete('cascade');
            $table->foreign('province_code')->references('code')->on('provinces');
            $table->foreign('district_code')->references('code')->on('districts');
            $table->foreign('ward_code')->references('code')->on('wards');
        });

        DB::unprepared('
                CREATE TRIGGER generate_address_id BEFORE INSERT ON addresses
                FOR EACH ROW
                BEGIN
                    IF NEW.address_id IS NULL OR NEW.address_id = \'\' THEN
                        SET NEW.address_id = CONCAT(\'AD\', LPAD((SELECT COALESCE(MAX(SUBSTRING(address_id, 3)) + 1, 1) FROM addresses), 3, \'0\'));
                    END IF;
                END
            ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
        DB::unprepared('DROP TRIGGER IF EXISTS generate_address_id');
    }
};
