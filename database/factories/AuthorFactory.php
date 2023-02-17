<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
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
            'image' => 'https://people.com/thmb/4qadRVrtYHmcwd0lo1k6-Pxmjss=/750x0/filters:no_upscale():max_bytes(150000):strip_icc():focal(563x480:565x482):format(webp)/henry-cavill-02-05e04cf5412e4993a893d60ee9abc092.jpg',
            'gender'  => $this->faker->title() ,
            'yob' => $this->faker->dateTimeBetween($startDate = '-40 years', $endDate = 'now', $timezone = null) ,
            'yod'  => $this->faker->dateTime($max = 'now', $timezone = null),
            'country'  => $this->faker->country(),
            'slug'=> $slug,
            'status' => true,
        ];
    }
}
