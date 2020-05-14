<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostReviewIndexResource;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use GuzzleHttp\Client;

class ReviewController extends Controller
{
    //
    public function show($id)
    {
        // return Review::findOrFail($id);
    }

    public function store(Request $request)
    {


        $data = $request->validate([
            // 'id' => 'required|size:36|unique:reviews',
            'content' => 'required|min:3|regex:/^[a-zA-Z0-9,.!? ]*$/',
            'rating' => 'required|in:1,2,3,4,5',
            'post_id' => 'required'
        ]);


        // $token = $request->recaptchaToken;
        // return $data;

        $token = $request->recaptchaToken;

        if ($token) {

            $client = new Client([
                'base_uri' => 'https://google.com/recaptcha/api/',
                'timeout' => 2.0
            ]);

            $response = $client->request('POST', 'siteverify', [
                'query' => [
                    'secret' => env('CAPTCHA_SECRET'),
                    'response' => $token
                ]
            ]);

            $results = json_decode($response->getBody()->getContents());

            if ($results->success) {
                $data['id'] = Str::uuid();
                $review = Review::make($data);
                $review->save();

                // return $review;
                return new PostReviewIndexResource($review);
            } else {

                // return redirect('/contact')->with('error', 'Spróbuj ponownie');
            }
        } else {
            
            // return redirect('/contact');
        }
    }
}
