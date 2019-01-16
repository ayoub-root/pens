<?php

use Illuminate\Database\Seeder;
use App\ChapterComment;

class ChapterCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ChapterComment::class, 50)->create();
    }
}
