<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Post;
use App\Category;

class PagesController extends Controller
{
    //
    public function index(){
        // $title = 'Welcome to my page';
        // return view('pages.index')->with('title', $title);
        return redirect('/posts');
    }

    public function about(){
        $categories = Category::all();
        $data = [
            'title' => 'O mnie',
            'subtitle' => 'Pare słów na mój temat.',
            'categories' => $categories
        ];
        return view('pages.about')->with($data);
    }

    public function contact(){
        $categories = Category::all();
        $data = [
            'title' => 'Welcome to my page',
            'subtitle' => 'Send me a message',
            'categories' => $categories,
            'bullets' => ['one', 'two', 'three']
        ];
        return view('pages.contact')->with($data);
    }

    // Search
    public function search(Request $request){

        // Validation
        $this->validate($request, [
            'search' => 'required|min:3'
        ]);

        $searched = $request->input('search');

        // $posts = Post::where('title', 'Pleśniak')->get();
        $posts = Post::where('title','LIKE','%'.$searched.'%')->get();

        $categories = Category::all();
        $data = [
            'categories' => $categories,
            'posts' => $posts
        ];
        return view('category.index')->with($data);
    }

}
