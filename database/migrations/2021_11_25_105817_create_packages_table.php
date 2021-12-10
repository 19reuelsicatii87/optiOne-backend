<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();       
            
            // Member Details
            // ========================================
            $table->string('membership_package', 10000)->nullable();
            $table->string('order_code')->nullable();
            $table->string('order_status')->nullable();
            $table->string('fullname', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('mobile', 100)->nullable();
            $table->string('landline', 100)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('civil_status', 100)->nullable();
            $table->string('date_of_birth', 100)->nullable();
            $table->string('slip_file_path', 100)->nullable();


            // Address and Payment Details
            // ========================================
            $table->string('houseBuild_name', 100)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('barangray', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('zipCode', 100)->nullable();
            $table->string('delivery_option', 100)->nullable();
            $table->float('delivery_fee', 8, 2)->nullable();
            $table->string('payment_option', 100)->nullable();
            $table->float('payment_fee', 8, 2)->nullable();
            $table->float('discount', 8, 2)->nullable();
            $table->float('total', 8, 2)->nullable();


             // TimeStamp Details
            // ========================================
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
