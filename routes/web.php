<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestController;

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

 
Route::get('/auth/{provider}/redirect', [ProviderController::class,'redirect']);
Route::get('/auth/{provider}/callback', [ProviderController::class,'callback'] );

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [ConversationController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/conversations', [ConversationController::class,'index'])->middleware(['auth', 'verified'])->name('conversations');
Route::get('/conversations/{user}', [ConversationController::class,'show'])->middleware(['auth', 'verified','canTalkTo'])->name('conversations.show');
Route::post('/conversations/{user}', [ConversationController::class,'store'])->middleware(['auth', 'verified','canTalkTo']);




Route::middleware('auth')->group(function () {
    Route::get('/friends', [HomeController::class , 'index'] )->name('friends');
    Route::post('/request/sent', [RequestController::class,'storeRequest'])->name('request');
    Route::post('/Qr/friend/{id}', [RequestController::class, 'storeQrRequest'])->name('qr');
    Route::get('/myprofile', [ProfileController::class, 'myprofile'])->name('profile.myprofile');
    Route::get('/requests/pending', [RequestController::class, 'getpending']);
    Route::get('/requests/Friends', [RequestController::class, 'getFriends']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
