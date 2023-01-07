<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->firstName();
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'image' => 'https://we25.vn/media/images/DLRfVy_W0AUdS6u.jpg',
            'link'  => '' ,
            'year' => $this->faker->date($format = 'Y', $max = 'now',),
            'time'  => '1:00:00',
            'country'  => $this->faker->country(),
            'slug'=> $slug,
            'status' => true,
        ];
    }
}
