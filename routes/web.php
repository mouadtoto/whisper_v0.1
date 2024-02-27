<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\Auth\ProviderController;
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
    Route::get('/MyProfile', [ProfileController::class, 'myprofile'])->name('profile.myprofile');
    Route::get('/UpdateMyProfile/{userId}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/UpdateMyProfile/{userId}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-message-auto-delete/{userId}', [ProfileController::class, 'updateMessage'])->name('profile.update-message-auto-delete');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
