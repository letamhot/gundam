<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bills')->delete();
        
        \DB::table('bills')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_user' => 1,
                'phone' => '0123456789',
                'address' => '123 adc',
                'priceTotal' => 8200000.0,
                'status' => 1,
                'id_coupon' => NULL,
                'created_at' => '2021-04-28 13:26:03',
                'updated_at' => '2021-04-28 13:26:21',
            ),
            1 => 
            array (
                'id' => 2,
                'id_user' => 2,
                'phone' => '0123456987',
                'address' => '15 trần hưng đạo',
                'priceTotal' => 750000.0,
                'status' => 1,
                'id_coupon' => NULL,
                'created_at' => '2021-04-28 13:56:16',
                'updated_at' => '2021-04-28 14:19:10',
            ),
            2 => 
            array (
                'id' => 3,
                'id_user' => 1,
                'phone' => '0123456789',
                'address' => '123 adc',
                'priceTotal' => 180000.0,
                'status' => 1,
                'id_coupon' => NULL,
                'created_at' => '2021-04-28 14:18:44',
                'updated_at' => '2021-04-28 14:19:06',
            ),
            3 => 
            array (
                'id' => 4,
                'id_user' => 1,
                'phone' => '0123456789',
                'address' => '123 adc',
                'priceTotal' => 1000000.0,
                'status' => 1,
                'id_coupon' => NULL,
                'created_at' => '2021-04-28 14:34:01',
                'updated_at' => '2021-04-28 14:34:22',
            ),
            4 => 
            array (
                'id' => 8,
                'id_user' => 2,
                'phone' => '0123456987',
                'address' => '15 trần hưng đạo',
                'priceTotal' => 750000.0,
                'status' => 1,
                'id_coupon' => NULL,
                'created_at' => '2021-04-28 14:47:59',
                'updated_at' => '2021-04-28 14:48:19',
            ),
        ));
        
        
    }
}