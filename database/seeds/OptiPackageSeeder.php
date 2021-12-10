<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptiPackageSeeder extends Seeder
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
        DB::table('opti_packages')->insert([
            [
                'membership_package' => 'Silver Membership',
                'price' => 3988.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'membership_package' => 'Gold Membership',
                'price' => 8888.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ],
            [
                'membership_package' => 'Platinum Membership',
                'price' => 14888.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
                
            ],
            [
                'membership_package' => 'Mobile Stockist',
                'price' => 50000.00,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);


        // DB::table('opti_packages')->delete();
    }
}
