<?php

namespace Database\Factories;

use App\Models\Actor;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actor>
 */
class ActorFactory extends Factory
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
            'gender'  => $this->faker->title() ,
            'yob' => $this->faker->dateTimeBetween($startDate = '-40 years', $endDate = 'now', $timezone = null) ,
            'yod'  => $this->faker->dateTime($max = 'now', $timezone = null),
            'country'  => $this->faker->country(),
            'slug'=> $slug,
            'status' => true,
        ];
    }
}
