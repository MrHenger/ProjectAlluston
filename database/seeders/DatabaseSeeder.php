<?php

namespace Database\Seeders;

use App\Models\Commentary;
use App\Models\Miniature;
use App\Models\Post;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        Photo::create(['route_photo' => 'usuarioAnonimo.jpg']);
        Miniature::create(['route_miniature' => 'maxresdefault.jpg']);
        Video::create(['route_video' => 'https://www.youtube.com/embed/ZCsS1GGPrWU']);
        Post::factory(100)->create();
        Commentary::factory(200)->create();
    }
}
