<?php

use Illuminate\Database\Seeder;
use App\NovelReview;

class NovelReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\NovelReview::class, 12)->create();
    }
}
