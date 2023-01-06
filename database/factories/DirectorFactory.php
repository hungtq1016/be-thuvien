<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\director>
 */
class DirectorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->name();
        $slug = Str::slug($name, '-');
        return [
            'name' => $name,
            'image' => 'https://we25.vn/media/images/DLRfVy_W0AUdS6u.jpg',
            'gender'  => $this->faker->title() ,
            'yob' => $this->faker->date($format = 'd-m-Y', $max = 'now'),
            'yod'  => $this->faker->date($format = 'd-m-Y', $max = 'now'),
            'country'  => $this->faker->country(),
            'slug'=> $slug,
            'status' => true,
        ];
    }
}
