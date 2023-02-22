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
            'image' => 'https://chiasemoi.com/wp-content/uploads/2017/12/ca-phe-cung-tony.jpg',
            'desc' => $this->faker->text(),
            'release' => $this->faker->year(),
            'country'=>$this->faker->country(),
            'major_id' => rand(1,15),
            'publisher_id' => rand(1,10),
            'language_id' =>rand(1,3),
            'bookself_id'=>rand(1,10),
            'series_id'=>rand(1,10),
            'status'=>1,
        ];
    }
}
