<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('blogs', [
        "blogs" => Blog::all()
    ]);
});

Route::get('/blogs/{blog}', function($slug) {
    return view('blog', [
        "blog" => Blog::find($slug)
    ]);
})->where('blog', "[A-z\d\-_]+");