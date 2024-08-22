<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/myposts', [PostController::class, 'myPosts'])->name('myposts');

    Route::get('/ai', [PostController::class, 'ai'])->name('ai');
    Route::get('/exams', [PostController::class, 'exams'])->name('exams');
    Route::get('/score01', [PostController::class, 'score01'])->name('score01');
    Route::get('/score02', [PostController::class, 'score02'])->name('score02');
    Route::get('/score03', [PostController::class, 'score03'])->name('score03');

    Route::get('/ranking01', [PostController::class, 'ranking01'])->name('ranking01');
    Route::get('/ranking01_japanese', [PostController::class, 'ranking01_japanese'])->name('ranking01_japanese');
    Route::get('/ranking01_math', [PostController::class, 'ranking01_math'])->name('ranking01_math');
    Route::get('/ranking01_english', [PostController::class, 'ranking01_english'])->name('ranking01_english');
    Route::get('/ranking01_science', [PostController::class, 'ranking01_science'])->name('ranking01_science');
    Route::get('/ranking01_society', [PostController::class, 'ranking01_society'])->name('ranking01_society');
    
    
    Route::get('/ranking02', [PostController::class, 'ranking02'])->name('ranking02');
    Route::get('/ranking02_japanese', [PostController::class, 'ranking02_japanese'])->name('ranking02_japanese');
    Route::get('/ranking02_math', [PostController::class, 'ranking02_math'])->name('ranking02_math');
    Route::get('/ranking02_english', [PostController::class, 'ranking02_english'])->name('ranking02_english');
    Route::get('/ranking02_science', [PostController::class, 'ranking02_science'])->name('ranking02_science');
    Route::get('/ranking02_society', [PostController::class, 'ranking02_society'])->name('ranking02_society');



    Route::get('/ranking03', [PostController::class, 'ranking03'])->name('ranking03');
    Route::get('/ranking03_japanese', [PostController::class, 'ranking03_japanese'])->name('ranking01_japanese');
    Route::get('/ranking03_math', [PostController::class, 'ranking03_math'])->name('ranking03_math');
    Route::get('/ranking03_english', [PostController::class, 'ranking03_english'])->name('ranking03_english');
    Route::get('/ranking03_science', [PostController::class, 'ranking03_science'])->name('ranking03_science');
    Route::get('/ranking03_society', [PostController::class, 'ranking03_society'])->name('ranking03_society');
  
    Route::post('/school-store', [PostController::class, 'school_store'])->name('school_store');
    Route::get('/school-registor', [PostController::class, 'school_registor'])->name('school_registor');

});

require __DIR__.'/auth.php';

