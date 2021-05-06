<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SlideImageTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('slide_image')->delete();
        
        \DB::table('slide_image')->insert(array (
            0 => 
            array (
                'id' => 2,
                'image' => 'slides/logo_1619362984.png',
                'created_at' => '2021-04-25 15:03:04',
                'updated_at' => '2021-04-25 15:03:04',
            ),
            1 => 
            array (
                'id' => 5,
                'image' => 'slides/10645848a_1619363078.jpg',
                'created_at' => '2021-04-25 15:04:38',
                'updated_at' => '2021-04-25 15:04:38',
            ),
            2 => 
            array (
                'id' => 6,
                'image' => 'slides/o1cn01e2zbvx1tjnaibm3wz_104862361_1619363171.jpg',
                'created_at' => '2021-04-25 15:06:11',
                'updated_at' => '2021-04-25 15:06:11',
            ),
        ));
        
        
    }
}