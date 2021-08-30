<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker      = Faker::create();
        $paragraph  = $faker->paragraph(6);
        foreach (range(1, 30) as $i)
            Post::create([
                'title'     => $title = $faker->sentence(5),
                'content'   => str_repeat("<p>". $title ." ". $paragraph ."</p>". PHP_EOL, rand(3, 5)),
            ]);
    }
}
