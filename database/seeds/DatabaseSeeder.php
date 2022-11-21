<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(
            UserSeeder::class,
            SettingsSeeder::class,
            GuestTypeSeeder::class,
        );
    }
}
