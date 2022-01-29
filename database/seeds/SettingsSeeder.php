<?php

use App\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        $this->createSettings();
    }

    public function createSettings()
    {
        $settings = [
            ['type_id' => 1, 'number' => 1],
            ['type_id' => 2, 'number' => 2],
            ['type_id' => 1, 'number' => 3],
            ['type_id' => 2, 'number' => 4],
            ['type_id' => 1, 'number' => 5],
        ];

        foreach ($settings as $setting) {
            Settings::create([
                'type_id' => $setting['type_id'],
                'number' => $setting['number'],
            ]);
        };
    }
}
