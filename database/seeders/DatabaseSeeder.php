<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProducersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(SlideImageTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(BillsTableSeeder::class);
        // $this->call(BillDetailsTableSeeder::class);
    }
}
