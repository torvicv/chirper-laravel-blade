<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::resource('chirps', ChirpController::class)
->only(['index', 'store', 'edit', 'update'])
->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::get('/members', [MemberController::class, 'index'])->name('member.index');
    Route::get('/members/{member}', [MemberController::class, 'show'])->name('member.show');
    Route::get('/member/{member}', [MemberController::class, 'edit'])->name('member.edit');
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::get('/users/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
