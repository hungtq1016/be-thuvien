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
        $title = $this->faker->firstName();
        $slug = Str::slug($title, '-');
        return [
            'title' => $title,
            'slug' => $slug,
            'specialization' => 1,
            'publisher' => 1,
            'image' => 'https://we25.vn/media/images/DLRfVy_W0AUdS6u.jpg',
            'language' =>1,
            'desc' => $this->faker->text(),
            'year' => $this->faker->year(),
            'bookself'=>1,
            'series'=>1,
            'country'=>$this->faker->country(),
            'status'=>1,
        ];
    }
}
