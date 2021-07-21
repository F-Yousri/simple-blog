<?php

use App\Http\Livewire\CreateUser;
use App\Http\Livewire\EditUser;
use App\Http\Livewire\ViewPost;
use App\Http\Livewire\ListPosts;
use App\Http\Livewire\ListUsers;
use App\Http\Livewire\PostDatatable;
use App\Http\Livewire\UserDatatable;
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
    Route::get('/manage-users-datatable',UserDatatable::class)->name('manage-users-datatable');
    Route::get('/manage-posts-datatable',PostDatatable::class)->name('manage-posts-datatable');
    Route::get('users', ListUsers::class)->name('users.index');
    Route::get('users/create', CreateUser::class)->name('users.create');
    Route::get('users/edit/{user}', EditUser::class)->name('users.edit');
});
