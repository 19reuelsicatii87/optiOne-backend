<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryOptionSeeder extends Seeder
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
        DB::table('delivery_options')->insert([
            [
                'delivery_option' => 'LBC',
                'delivery_fee' => 0.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'delivery_option' => 'JT&T Express',
                'delivery_fee' => 0.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'delivery_option' => 'JRS Express',
                'delivery_fee' => 0.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
                
            ],
            [
                'delivery_option' => '2GO Express',
                'delivery_fee' => 0.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
