<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\UserController;
use App\MyUtils\GoogleBookApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/dashboard',function (){

    $api = new GoogleBookApi('computerscience+mostpopular');
    $api->setResultSize('3');
    $imageUrls = $api->getBigImageUrls();

    //prevent /dashboard is used directly without login
   if(Session::has('uid')){
       return view('dashboard',compact('imageUrls'));
   }
   else{
       return view('login');
   }
})->name('dashboard');

Route::any('/search',function(Request $request){
    $bookController = new BookController();

    //The request from redirect will not have key 'searchText' and 'searchBy', so we store them in session before redirection
    //and set them as default here in order to get the same books collection after borrow a book. If the request is from search
    // function, then we use the key 'searchText' and 'searchBy' in request to replace the value in session to execute the query.

    $searchText = Session::get('searchText');
    $searchBy = Session::get('searchBy');
    if($request->has('searchText') && $request->has('searchBy')){
        $searchText = $request->searchText;
        $searchBy = $request->searchBy;
    }

    return $bookController->search($searchBy,$searchText);
})->name('search');

Route::get('/search-page',function(){
    $bookController = new BookController();
   return $bookController->search(0,'');
})->name('search-page');

Route::get('/loan/{bookid}', [BookController::class,'borrow']);

Route::get('/user/edit',function(Request $request){
   $user = DB::table('users')
       ->where('id','=',$request->session()->get('uid'))
       ->first();

   return view('useredit',compact('user'));
})->name('user-edit');

Route::POST('/user/update',[UserController::class,'update'])->name('user-update');

Route::get('/check-loan',[LoanController::class, 'checkLoanRecords'])->name('check-loan');

Route::get('/renew/{id}',[LoanController::class,'renew'])->name('renew');

Route::view('/contact-us','contact-us');

Route::post('/submit-message', function(Request $request){

    $request->validate([
        'contactEmail'=>'required|email',
        'subject'=> 'required',
        'content'=> 'required'
    ]);

   $res = DB::table('contact_us')
       ->insert([
           'contact_email' => $request->contactEmail,
           'subject'=> $request->subject,
           'content'=> $request->content
       ]);
    if($res){
        return back()->with('success', 'Your message has been sent');
    }else{
        return back()->with('fail','The message is not sent successfully, please check and send it again!');
    }
})->name('submit-message');

Route::get('/test',function (){
    $api = new GoogleBookApi('computerscience+mostpopular');
    $api->setResultSize('3');
    $imageUrls = $api->getBigImageUrls();
    return view('dashboard',compact('imageUrls'));
});
