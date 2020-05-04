<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostReviewIndexResource;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'content' => 'required|min:2',
            'rating' => 'required|in:1,2,3,4,5',
            'post_id' => 'required'
        ]);
        $data['id'] = Str::uuid();
        $review = Review::make($data);
        $review->save();

            // return $review;
        return new PostReviewIndexResource($review);
    }
    

}
