<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $title = 'Welcome to my page';
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'Welcome to my page';
        return view('pages.about')->with('title', $title);
    }

    public function contact(){
        $data = [
            'title' => 'Welcome to my page',
            'subtitle' => 'Send me a message',
            'bullets' => ['one', 'two', 'three']
        ];
        return view('pages.contact')->with($data);
    }
}
