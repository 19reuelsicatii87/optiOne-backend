<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptiProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opti_products', function (Blueprint $table) {
            $table->id();
            $table->string('order_product', 100)->nullable();
            $table->string('category', 100)->nullable();
            $table->string('bundle', 100)->nullable();
            $table->float('price', 8, 2)->nullable();
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
        Schema::dropIfExists('opti_products');
    }
}
