<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Http\Resources\PostIndexResource;
use App\Post;

class ShowPostsFromCategory extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        //// Show posts from selected category

        $category = Category::findOrFail($id);

        $posts = $category->posts()->orderBy('created_at', 'desc')->get();           
        // $posts = $category->posts()->orderBy('created_at', 'desc')->paginate(2);    // paginacja
        
        
        return PostIndexResource::collection($posts);
    }
}
