<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTableV2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            // Lead Details
            // ========================================
            $table->string('fullname', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('mobile', 100)->nullable();
            $table->string('stage', 100)->nullable();
            $table->string('status', 100)->nullable();
            $table->string('message', 10000)->nullable();

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
        Schema::dropIfExists('leads_table_v2');
    }
}
