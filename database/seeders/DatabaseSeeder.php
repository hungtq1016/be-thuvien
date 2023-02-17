<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     AuthorSeeder::class,
        //     BookSeeder::class,
        //     CategorySeeder::class,
        //     MajorSeeder::class,
        //     PublisherSeeder::class,
        //     TagSeeder::class,
        //     UserSeeder::class,
        // ]);
        for($j = 0; $j <= 100; $j++){
            DB::table('book_tag')->insert([
                'book_id' => rand(1,100),
                'tag_id' => rand(1,20),
            ]);
        }
    }
}
