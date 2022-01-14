<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
        DB::table('users')->insert([
            [
                'fullname' => 'Admin Admin',
                'emailAddress' => 'admin@admin.com',
                'password' => 'M@lasakit',
                'is_emailconfirmed' => '1',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
