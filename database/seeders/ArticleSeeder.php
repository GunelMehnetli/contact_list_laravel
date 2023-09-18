<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i< 4; $i++){
            $title=$faker->sentence(6);
            Db::table('articles')->insert([
                'category_id'=>rand(1,7),
                'title'=>$title,
                'image'=> $faker->imageUrl(400, 300, 'cats'),
                'content'=>$faker->paragraph(6),
                'slug'=>Str::slug($title),
                'created_at' => $faker->dateTime('now'),
                'updated_at' => now()

            ]);
        }
    }
}
