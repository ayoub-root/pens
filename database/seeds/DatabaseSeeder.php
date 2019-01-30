<?php

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
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(NovelsTableSeeder::class);
        $this->call(ChaptersTableSeeder::class);
        $this->call(ChapterCommentsTableSeeder::class);
        $this->call(NovelReviewsTableSeeder::class);
    }
}
