<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(
            GuestTypeSeeder::class,
            );

        $this->call(
            SettingsSeeder::class,
        );
    }
}
