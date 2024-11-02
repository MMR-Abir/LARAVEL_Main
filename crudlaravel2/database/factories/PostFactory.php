<?php

namespace Database\Factories;

use App\Models\Post;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
$name=$this->faker->word(3,true);
$detail=$this->faker->word(15,true);
        return [
            'name'=>$name,
            'detail'=>$detail

        ];
    }
}
