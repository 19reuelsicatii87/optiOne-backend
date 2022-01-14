<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // Lead Details
            // ========================================
            $table->string('fullname', 100)->nullable();
            $table->string('emailAddress', 100)->nullable();
            $table->string('password', 100)->nullable();
            $table->string('is_emailconfirmed', 100)->nullable();


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
        //
    }
}
