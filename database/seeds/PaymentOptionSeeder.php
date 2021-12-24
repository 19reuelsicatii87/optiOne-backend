<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Insert records in record in Database table
        //====================================================
        DB::table('payment_options')->insert([
            [
                'payment_option' => 'GCash',
                'payment_fee' => 10.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'payment_option' => 'Bank Transfer',
                'payment_fee' => 5.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'payment_option' => 'Cash on Delivery',
                'payment_fee' => 0.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'payment_option' => 'Pay Maya',
                'payment_fee' => 2.50,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
