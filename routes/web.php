<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth.check')->group(function () {
    //  Post routes
    Route::get('/', [PostController::class, 'index'])->name('dashboard');
    Route::get('/post/{post:slug}', [PostController::class, 'show']);

    // logout route
    Route::get('/logout', [LoginController::class, 'destory']);

    // store comment
    Route::post('/comment/{post:slug}', [CommentController::class, 'store']);

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::get('/profile/delete', [ProfileController::class, 'delete'])->name('profile.delete');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('profile.edit');
    Route::post('/profile/forgotpassword', [ForgotPasswordController::class, 'update'])->name('profile.forgotpassword');

    // create post by admin
    Route::get('/admin/posts/create', [PostController::class, 'create'])->middleware('admin.check');
    Route::post('/admin/posts/create', [PostController::class, 'store'])->middleware('admin.check');

    // create category by admin
    Route::get('/admin/category/create', [CategoryController::class, 'create'])->middleware('admin.check');
    Route::post('/admin/category/create', [CategoryController::class, 'store'])->middleware('admin.check');
});

Route::middleware('auth.logout.check')->group(function () {

    // Signup routes
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    // login route
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
});

Route::fallback(function () {
    return back();
});
