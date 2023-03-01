<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Publisher;
use Carbon\Carbon;
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

        $this->call([
            // AuthorSeeder::class,
            // BookSeeder::class,
            // CategorySeeder::class,
            // MajorSeeder::class,
            // PublisherSeeder::class,
            // TagSeeder::class,
            // UserSeeder::class,
            // ImageSeeder::class,
        ]);
        for($j = 0; $j <= 200; $j++){

            $created_at = Carbon::create(2022, 1, 1, 0, 0, 0)->addWeeks(rand(1, 70));

            DB::table('user_loan')->insert([
                'book_id' => rand(1,100),
                'user_id' => rand(1,100),
                'loan_id' => rand(1,4),
                'start_time' => $created_at,
                'expired_time' => $created_at->addWeeks(2),
            ]);
        }
    }
}
