<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BillDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bill_details')->delete();
        
        \DB::table('bill_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'id_bill' => 1,
                'id_product' => 2,
                'quantity' => 1,
                'price' => 6400000.0,
                'created_at' => '2021-04-28 13:26:03',
                'updated_at' => '2021-04-28 13:26:03',
            ),
            1 => 
            array (
                'id' => 2,
                'id_bill' => 1,
                'id_product' => 3,
                'quantity' => 1,
                'price' => 1800000.0,
                'created_at' => '2021-04-28 13:26:03',
                'updated_at' => '2021-04-28 13:26:03',
            ),
            2 => 
            array (
                'id' => 3,
                'id_bill' => 2,
                'id_product' => 14,
                'quantity' => 1,
                'price' => 750000.0,
                'created_at' => '2021-04-28 13:56:16',
                'updated_at' => '2021-04-28 13:56:16',
            ),
            3 => 
            array (
                'id' => 4,
                'id_bill' => 3,
                'id_product' => 3,
                'quantity' => 1,
                'price' => 180000.0,
                'created_at' => '2021-04-28 14:18:44',
                'updated_at' => '2021-04-28 14:18:44',
            ),
            4 => 
            array (
                'id' => 5,
                'id_bill' => 4,
                'id_product' => 2,
                'quantity' => 1,
                'price' => 640000.0,
                'created_at' => '2021-04-28 14:34:01',
                'updated_at' => '2021-04-28 14:34:01',
            ),
            5 => 
            array (
                'id' => 6,
                'id_bill' => 4,
                'id_product' => 3,
                'quantity' => 1,
                'price' => 180000.0,
                'created_at' => '2021-04-28 14:34:01',
                'updated_at' => '2021-04-28 14:34:01',
            ),
            6 => 
            array (
                'id' => 7,
                'id_bill' => 4,
                'id_product' => 4,
                'quantity' => 1,
                'price' => 180000.0,
                'created_at' => '2021-04-28 14:34:01',
                'updated_at' => '2021-04-28 14:34:01',
            ),
            7 => 
            array (
                'id' => 10,
                'id_bill' => 8,
                'id_product' => 14,
                'quantity' => 1,
                'price' => 750000.0,
                'created_at' => '2021-04-28 14:47:59',
                'updated_at' => '2021-04-28 14:47:59',
            ),
        ));
        
        
    }
}