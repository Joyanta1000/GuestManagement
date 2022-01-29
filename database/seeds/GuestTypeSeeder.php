<?php

use App\GuestType;
use Illuminate\Database\Seeder;

class GuestTypeSeeder extends Seeder
{
    public function run()
    {
        $this->createGuestType();
    }

    public function createGuestType(){
        $guestTypes = [
            ['type' => 'Adult'],
            ['type' => 'Child'],
        ];

        foreach ($guestTypes as $guestType) {
            GuestType::create([
                'type' => $guestType['type'],
            ]);
        };
    }
}
