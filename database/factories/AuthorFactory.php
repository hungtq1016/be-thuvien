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
        $gender=array("Nam","Nữ","Khác");
        return [
            'name' => $name,
            'slug'=> $slug,
            'image_id' => rand(1,100),
            'gender'  => $gender[rand(0,2)] ,
            'yob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'yod'  => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'country'  => $this->faker->country(),
            'status' => true,
        ];
    }
}
