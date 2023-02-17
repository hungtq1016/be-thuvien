<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
            CategorySeeder::class,
            MajorSeeder::class,
            PublisherSeeder::class,
            TagSeeder::class,
            UserSeeder::class,
        ]);

    }
}
