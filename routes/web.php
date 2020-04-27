<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Running with Vue
Route::get('/{any?}', function () {
    return view('vue');
})->where('any', '^(?!api\/)[\/\w\.-]*');


// page routes
// Running with blade 
// Route::get('/', 'PagesController@index');


Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

// Rout for search form
Route::get('/search', 'PagesController@search');

// Mail route
// Route::get('/send-mail', function () {
Route::get('/send-mail', 'PagesController@sendEmail');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('posts', 'PostsController');
Route::resource('category', 'CategoryController');

Auth::routes();

Route::get('/home', 'HomeController@index');
