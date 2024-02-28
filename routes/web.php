<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', [ConversationController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/conversations', [ConversationController::class,'index'])->middleware(['auth', 'verified'])->name('conversations');
Route::get('/conversations/{user}', [ConversationController::class, 'show'])
    ->middleware(['canTalkTo', 'auth', 'verified'])
    ->name('conversations.show');

Route::post('/conversations/{user}', [ConversationController::class, 'store'])
    ->middleware(['canTalkTo', 'auth', 'verified'])
    ->name('conversations.store');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
