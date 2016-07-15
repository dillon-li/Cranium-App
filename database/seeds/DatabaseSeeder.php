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

        // These particular seeders will only work if the database if empty
        $this->call(CardColorSeeder::class);
        $this->call(CardTypeSeeder::class);
    }
}
