<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class CategoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Open a form for create a new category
        return view('category.create');

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
                    'body' => 'required',
                    'slider_image' => 'image|nullable|max:1999'
                ]);
        
                // Handle File Upload
                if($request->hasFile('slider_image')){
                    $filenameWithExt = $request->file('slider_image')->getClientOriginalName();
                    //Get just filemame
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    //Get just ext
                    $extension = $request->file('slider_image')->getClientOriginalExtension();
                    $fileNameToStore = $filename.'_'.time().'.'.$extension;
        
                    // Upload Image
                    $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);
                } else {
                     $fileNameToStore = 'noimage.jpg';
                }
        
                // create category
                $category = new Category();
                $category->title = $request->input('title');
                $category->body = $request->input('body');
                // $category->user_id = auth()->user()->id;
                $category->slider_image = $fileNameToStore;
                $category->save();
        
                // return $request->input('cars');
                return redirect('/category')->with('success', 'Category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Show posts from selected category
        // $posts = Post::orderBy('created_at', 'desc')->paginate(10);


        $posts = Category::find($id)->posts;
        
        // $posts = Category::find($id)->paginate(10)->posts;
        $categories = Category::all();
        $data = [
            'categories' => $categories,
            'posts' => $posts
        ];
        // return $posts;
        return view('pages.find')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // Edit category

        $category = Category::find($id);

        return view('category.edit')->with('category', $category);
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
        $category = Category::find($id);
        // Update category
        // Validation
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'slider_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('slider_image')){
            $filenameWithExt = $request->file('slider_image')->getClientOriginalName();
            //Get just filemame
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload Image
            $path = $request->file('slider_image')->storeAs('public/slider_images', $fileNameToStore);
        } else {
                $fileNameToStore = $category->slider_image;
        }

        // update post
        $category->title = $request->input('title');
        $category->body = $request->input('body');
        $category->slider_image = $fileNameToStore;
        $category->save();
        
        return redirect('/category')->with('success', 'Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete category
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'Category deleted');
    }
}
