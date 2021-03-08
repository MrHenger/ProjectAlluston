<?php

namespace Database\Factories;

use App\Models\Miniature;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'miniature_id' => 1,
            'video_id' => 1,
            'user_id' => 1,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->text(1000),
        ];
    }
}
