<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Book::class;

    public function definition()
    {
        $name = $this->faker->name();
        $slug = Str::slug($name, '-');
        return [
            'name' => $name,
            'slug' => $slug,
            'desc' => $this->faker->text(),
            'release' => $this->faker->year(),
            'country'=>$this->faker->country(),
            'quantity' => rand(1,50),
            'count' => rand(1,100),
            'image_id' => rand(1,100),
            'major_id' => rand(1,20),
            'publisher_id' => rand(1,20),
            'language_id' =>rand(1,5),
            'bookself_id'=>rand(1,10),
            'series_id'=>rand(1,20),
            'status'=>1,
        ];
    }
}
