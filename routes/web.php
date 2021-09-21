<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FE\PostController;
use App\Http\Controllers\FE\HomeController;


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/dakwah', [HomeController::class, 'dakwah'])->name('dakwah');
Route::get('/sosial', [HomeController::class, 'sosial'])->name('sosial');
Route::get('/wirausaha', [HomeController::class, 'wirausaha'])->name('wirausaha');
Route::get('/post', [PostController::class, 'index'])->name('fe-post.index');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('fe-post.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';