<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gumman',
                'slug' => 'gumman',
                'created_at' => '2021-04-14 06:47:55',
                'updated_at' => '2021-04-25 14:30:35',
                'deleted_at' => '2021-04-25 14:30:35',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Hight Grade',
                'slug' => 'hight-grade',
                'created_at' => '2021-04-25 14:39:14',
                'updated_at' => '2021-04-25 14:39:14',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Master Grade',
                'slug' => 'master-grade',
                'created_at' => '2021-04-25 14:39:30',
                'updated_at' => '2021-04-25 14:39:30',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Perfect Grade',
                'slug' => 'perfect-grade',
                'created_at' => '2021-04-25 14:39:53',
                'updated_at' => '2021-04-25 14:39:53',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Real Grade',
                'slug' => 'real-grade',
                'created_at' => '2021-04-25 14:40:15',
                'updated_at' => '2021-04-25 14:40:15',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Super Deformed',
                'slug' => 'super-deformed',
                'created_at' => '2021-04-25 14:40:29',
                'updated_at' => '2021-04-25 14:40:29',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}