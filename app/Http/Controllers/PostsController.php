<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['index', 'show', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all posts 
        // // $posts = Post::all();
        // $posts = Post::orderBy('title', 'asc')->get();
        // $posts = Post::where('title', 'Pleśniak')->get();
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();
        // $posts = Post::orderBy('title', 'desc')->get();

        $categories = Category::all();

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'categories' => $categories,
            'posts' => $posts,
        ];
        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get categories list
        $categories = Category::all();
        // Create a new post
        // return view('posts.create')->with('categories', $categories);
        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'title' => 'required',
            'summary' => 'required|max:191',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filemame
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
             $fileNameToStore = 'noimage.jpg';
        }

        // create post
        $post = new Post();
        $post->title = $request->input('title');
        $post->summary = $request->input('summary');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->category_id = $request->input('category_id');
        $post->save();

        // return $request->input('cars');
        return redirect('/home')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show a single post
        $post = Post::find($id);
        $categories = Category::all();
        $data = [
            'categories' => $categories,
            'post' => $post
        ];
        return view('posts.post')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Edit post


        $categories = Category::all();
        $post = Post::find($id);
        $data = [
            'categories' => $categories,
            'post' => $post
        ];
        return view('posts.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        // Update post
        // Validation
        $this->validate($request, [
            'title' => 'required',
            'summary' => 'required|max:191',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filemame
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
                $fileNameToStore = $post->cover_image;
        }

        // update post
        $post->title = $request->input('title');
        $post->summary = $request->input('summary');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        $post->cover_image = $fileNameToStore;
        $post->save();
        
        return redirect('/home')->with('success', 'Post updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete post
        $post = Post::find($id);
        $post->delete();
        return redirect('/home')->with('success', 'Post deleted');
    }
}
