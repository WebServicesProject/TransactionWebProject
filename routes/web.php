<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
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
    return view('login');
});

Route::get('/login', function (){
    return view('login');
});

Route::get('/register', function (){
    return view('registration');
});

Route::post('/register-user',[AuthController::class,'registerUser'])->name('register-user');

Route::post('/login-user',[AuthController::class,'loginUser'])->name('login-user');

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/dashboard',function (){

    //prevent /dashboard is used directly without login
   if(Session::has('userId')){
       return view('dashboard');
   }
   else{
       return view('login');
   }
});

Route::any('/fuzzy-search',[BookController::class,'fuzzySearch'])->name('fuzzy-search');

Route::get('/book-search',function(){
   return view('book-search');
});
