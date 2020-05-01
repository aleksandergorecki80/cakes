<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostIndexResource;
use App\Http\Resources\PostShowResource;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    // API POST CONTROLLER

    public function index()
    {
        return PostIndexResource::collection(Post::all());
    }

    public function show($id)
    {
        return new PostShowResource(Post::findOrFail($id));
    }

}
