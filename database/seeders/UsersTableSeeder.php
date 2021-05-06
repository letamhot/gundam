<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'provider' => NULL,
                'provider_id' => NULL,
                'user_type' => 'admin',
                'avatar' => 'imageUser/137541310_784454285615299_5525174507611927981_n_1611242629_1619620902.jpg',
                'gender' => 0,
                'address' => '123 adc',
                'phone' => '0123456789',
                'email_verified_at' => NULL,
                'password' => '$2y$10$8GY4UAmoEbvelSWjFUd55u4XYlOSOI2Urr64EskgnhEtIcsO26WkK',
                'remember_token' => NULL,
                'created_at' => '2021-04-28 13:24:32',
                'updated_at' => '2021-04-28 14:41:42',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Bảo Nguyên',
                'email' => 'tungton1208@gmail.com',
                'provider' => NULL,
                'provider_id' => NULL,
                'user_type' => 'customer',
                'avatar' => 'imageUser/83820453_p0_1619618152.jpg',
                'gender' => 0,
                'address' => '15 trần hưng đạo',
                'phone' => '0123456987',
                'email_verified_at' => NULL,
                'password' => '$2y$10$wOEZvhyCYpolpc3yWJm08eZ9m9EzPZiKwcdeqnhcnMr2PLbnn.AXq',
                'remember_token' => NULL,
                'created_at' => '2021-04-28 13:55:00',
                'updated_at' => '2021-04-28 14:58:14',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}