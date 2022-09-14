<?php

use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm']);

Route::post('/register-user',[AuthController::class,'registerUser'])->name('register-user');

Route::post('/login-user',[AuthController::class,'loginUser'])->name('login-user');

Route::get('/dashboard',function (){
   return view('dashboard');
});
