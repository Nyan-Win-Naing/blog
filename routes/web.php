<?php

use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\fileExists;

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
    return view('blogs');
    // return "creativecoder";
    // return ["key" => "creativecoder"];
});

Route::get('/blogs/{blog}', function($slug) {
    // dd($slug);
    $path=__DIR__."/../resources/blogs/$slug.html";
    if(!file_exists($path)) {
        // dd("hit");
        // abort(404);
        return redirect("/");
    }
    $blog = file_get_contents($path);
    return view('blog', [
        "blog" => $blog
    ]);
})->where('blog', "[A-z\d\-_]+");