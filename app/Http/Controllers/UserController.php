<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /*
     *
     */
    function update(Request $request){
        //$request validation
        $request->validate([
            'newPassword' => 'required'|'confirmed',
            'email'=>'required|email'
        ]);

        //predefine variable $res
        $res = false;

        //get the current user information by id
        $user = DB::table('users')
            -> where('id','=',$request->session()->get('uid'))
            ->first();

        //check if the email from request is unique in database.
        $email = $request->email;
        //1. If the email from request is same as the user original email, then jump to next step: check old password
        if($email == $user->email){
            goto nextstep;
        }
        //2. otherwise check if the changed email is not existed in database in another user
        else{
            $userWithNewEmail =  DB::table('users')
                -> where('email','=',$email)
                ->get();

            if($userWithNewEmail != null){
                return back()->withinput()->with('fail', 'The email has been used by another user, please input another one!');
            }
        }
        //Check if the oldPassword from request is same as the exist password in database. If yes, allow the user data to
        //be updated, otherwise return the fail message
        nextstep:
//        dd($user->password);
        if(Hash::check($request->oldPassword,$user->password)){
            $res = DB::table('users')
                ->where('id','=',$request->session()->get('uid'))
                ->update([
                    'password' => Hash::make($request->password),
                    'email' => $email]);
        }else{
            return back()->withInput()->with('fail','The old password is wrong, please check it!');
        }

        if($res){
            return back()->with('success','successfully update');
        }else{
            return back()->withInput()->with('fail','Update failed, please check the input');
        }
    }
}
