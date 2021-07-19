<?php

use App\Http\Livewire\ViewPost;
use App\Http\Livewire\ListPosts;
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

Route::redirect('/', '/posts');

Route::prefix('posts')->group(function () {
    Route::get('/', ListPosts::class)->name('list-posts');
    Route::get('/{post}', ViewPost::class);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('posts')->group(function () {
    });
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
