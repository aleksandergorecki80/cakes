<?php

use Illuminate\Database\Seeder;

use App\Post;
use App\Review;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::all()->each(function (Post $post){
            $reviews = factory(Review::class, random_int(2, 10))->make();

            $post->reviews()->saveMany($reviews);
        });

    }
}
