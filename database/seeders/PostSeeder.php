<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 300; $i++) {
            DB::table('posts')->insert([
                'category_id' => rand(1, 5),
                'user_id' => rand(1, 10),
                'judul' => $faker->sentence(3),
                'slug' => Str::slug($faker->sentence(3)),
                'body' => $faker->paragraph(80),
                'excerpt' => $faker->sentence(rand(5,10)),
                'dilihat' => rand(1, 30),
                'status' => $faker->randomElement(['publish', 'draft', 'pending']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}