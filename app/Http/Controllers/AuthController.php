<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //

//    public function login(){
//        return view('log-in');
//    }

//    public function registerForm(){
//        return view('register');
//    }

    public function registerUser(Request $request){
        $request->validate([
            'username'=>'required|unique:users|min:2|max:50',
            'password'=>'required|confirmed',
            'email'=>'required|unique:users|email'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $res = $user->save();

        if($res){
            sleep(1);
            return redirect('login')->with('success','New user has successfully registered, please sign in')->with('username',$request->username);
        }else{
            return back()->with('fail','Something wrong!');
        }
    }

    public function loginUser(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('username', '=', $request->username)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('uid', $user->id);
                $request->session()->put('username', $user->username);

                return redirect('dashboard');
//                return view('dashboard',['username'=>$user->username]);
            }else{
                return back()->with('fail','user credential does not match!');
            }
        }else{
            return back()->with('fail','this username does not exist!');
        }
    }

    public function logout(){
        if(Session::has('uid')){
            Session::flush();
            return redirect('login');
        }
    }
}
