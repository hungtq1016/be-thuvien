<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publisher>
 */
class PublisherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->company();
        $slug = Str::slug($name, '-');
        return [
            'name' => $name,
            'slug'=> $slug,
            'image'=> 'https://tailwindui.com/img/ecommerce-images/home-page-01-category-02.jpg',
            'desc'=> $this->faker->text(),
            'status' => true,
        ];
    }
}
