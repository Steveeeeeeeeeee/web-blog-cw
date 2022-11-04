<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//posts route with the show function in the controller
Route::get('/posts', [PostController::class, 'show'])->name('posts');       

//get a post with an id
Route::get('/posts/{id}', [PostController::class, 'showId'])->name('post');



Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.store');

require __DIR__.'/auth.php';

