<?php

use App\Http\Controllers\AnwController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\QuizController;
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
})->name('home');

// quiz
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.home');
Route::get('/quiz/game/', [QuizController::class, 'show'])->name('quiz.word');
Route::get('/quiz/game/res', [QuizController::class, 'check'])->name('quiz.res');

// Dictionary
Route::get('/dict', [DictionaryController::class, 'index'])->name('dict.index');

// add new words

Route::get('/add', [AnwController::class, 'index'])->name('add.index');
Route::post('/add', [AnwController::class, 'store'])->name('add.store');