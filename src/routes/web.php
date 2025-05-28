<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/register', [ContactController::class, 'showRegisterForm']) ;
Route::post('/register', [ContactController::class, 'register']);
Route::get('/login', [ContactController::class, 'showLoginForm']);
Route::post('/login', [ContactController::class, 'login']);

Route::get('/contact', [ContactController::class, 'create']);Route::post('/confirm', [ContactController::class, 'confirm']);
Route::get('/confirm', function () {
    return redirect('/contact');
});
Route::post('/store', [ContactController::class, 'store']);
Route::get('thanks', [ContactController::class, 'thanks']);
Route::middleware('auth')->group(function () {
    Route::get('/', [ContactController::class, 'index']);
});
