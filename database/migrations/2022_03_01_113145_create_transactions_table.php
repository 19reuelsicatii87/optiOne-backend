<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();       
            
            // Transaction Details
            // ========================================
             $table->string('order_code', 1000)->nullable();
             $table->string('type', 1000)->nullable(); 
            $table->string('source_id', 1000)->nullable();
            $table->string('source_type', 1000)->nullable(); 
            $table->string('status', 1000)->nullable();           
            $table->string('amount', 1000)->nullable();
            $table->string('checkout_url', 1000)->nullable();
            $table->text('response_source', 10000)->nullable();
            $table->text('response_chargeable', 10000)->nullable();
            $table->text('response_payment', 10000)->nullable();           


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
        Schema::dropIfExists('transactions');
    }
}
