<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PersonalInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('personal_information')->insert([
                'company_name' => $faker->company,
                'full_name' => $faker->name,
                'office_number' => $faker->phoneNumber,
                'email' => $faker->email,
                'faks' => $faker->phoneNumber, // Faks sütunu eklendi
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
