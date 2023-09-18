<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PhoneNumber;
use Faker\Factory as Faker;

class PhoneNumbersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            PhoneNumber::create([
                'phone_number' => $faker->phoneNumber,
                'personal_information_id' => $faker->numberBetween(1, 10), // Rastgele kişisel bilgi ID'si
            ]);
        }
    }
}
