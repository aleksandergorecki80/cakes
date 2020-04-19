<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Post;
use App\Category;

// Using reCaptcha
use GuzzleHttp\Client;
use App\Rules\Captcha;

use Session;

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

            'categories' => $categories,

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
        return view('pages.find')->with($data);
    }

    // Send email
    public function sendEmail(Request $request){

        // Validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required',
        ]);

        $details = [
            'title' => 'Wiadomość z bloga.',
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'body' => $request->input('body')
        ];

        $token = $request->input('g-recaptcha-response');

        if($token){
        
            $client = new Client([
                'base_uri' => 'https://google.com/recaptcha/api/',
                'timeout' => 2.0
                ]);
    
            $response = $client->request('POST', 'siteverify', [
                'query' => [
                'secret' => env('CAPTCHA_SECRET'),
                'response' => $token]]);
    
            $results = json_decode($response->getBody()->getContents());

            if($results->success){
                \Mail::to('a.gorecki1980@gmail.com')->send(new \App\Mail\SendMail($details));
                return redirect('/posts')->with('success', 'Wiadomość wysłana');
            } else {
                return redirect('/contact')->with('error', 'Spróbuj ponownie');
            }

        } else {
            // dd($token);
            return redirect('/contact');
        }
    }

}
