<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Http\Resources\PostReviewIndexResource;

class PostReviewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id, Request $request)
    {
        //
        $post = Post::findOrFail($id);

        return PostReviewIndexResource::collection(
            $post->reviews()->latest()->get()
        );

        // return $post->reviews()->latest()->get();
    }
}
