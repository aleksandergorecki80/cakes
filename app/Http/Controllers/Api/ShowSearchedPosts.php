<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostIndexResource;

use App\Post;

class ShowSearchedPosts extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        // Wyszukuje posty z wpisanego w pole wyszukiwania 
        
        $data = $request->validate([
            'searched' => 'required|min:3|regex:/^[A-Za-z]+$/'
        ]);
        
        $searched = $request->input('searched');
        
        $posts = PostIndexResource::collection(Post::where('title','LIKE','%'.$searched.'%')->get());      
        return (count($posts)>0) ? $posts : response()->json([], 404);
         
    }
}
