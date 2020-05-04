<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('posts', 'Api\PostController@index');
// Route::get('posts/{id}', 'Api\PostController@show');

Route::apiResource('posts', 'Api\PostController')->only(['index', 'show']);

// search field - works but dont display, I dont know how to do it
Route::get('search', 'Api\ShowSearchedPosts')->name('posts.search.show');

// pobiera kategorie do menu
Route::get('loadmenu', 'Api\ShowMenu')->name('mainmenu.show');

// pobiera liste komentazy
Route::get('posts/{post}/reviews', 'Api\PostReviewController')->name('posts.reviews.show');

// api responsible for reviews
Route::apiResource('reviews', 'Api\ReviewController')->only(['show', 'store']);