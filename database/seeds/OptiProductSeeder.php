<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptiProductSeeder extends Seeder
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
        DB::table('opti_products')->insert([
            [
                'order_product' => 'One Opti Juice',
                'category' => 'Member',
                'bundle' => '1 Bottle One Opti',
                'price' => 200.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'order_product' => 'One Opti Juice',
                'category' => 'Member',
                'bundle' => '15 Bottle One Opti',
                'price' => 3000.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'order_product' => 'One Opti Juice',
                'category' => 'Member',
                'bundle' => '50 Bottle One Opti',
                'price' => 10000.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")

            ],
            [
                'order_product' => 'One Opti Juice',
                'category' => 'Member',
                'bundle' => '108 Bottle One Opti',
                'price' => 21600.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'order_product' => 'One Opti Juice',
                'category' => 'Guest',
                'bundle' => '1 Bottle One Opti',
                'price' => 350.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'order_product' => 'One Opti Juice',
                'category' => 'Guest',
                'bundle' => '4 Bottle One Opti',
                'price' => 1200.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'order_product' => 'One Opti Juice',
                'category' => 'Guest',
                'bundle' => '12 Bottle One Opti',
                'price' => 3500.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
