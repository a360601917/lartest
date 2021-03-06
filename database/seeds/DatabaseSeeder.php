<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(GoodsTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(AdvertisingTableSeeder::class);
    }
}
