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
            'email'=>'required|unique:users|email'
        ]);

        //predefine variable $res
        $res = false;

        //get the current user information by id
        $user = DB::table('users')
            -> where('id','=',$request->session()->get('userId'))
            ->first();

        //Hash oldPassword from request in order to check if it's same as the exist password in database
        $oldPassword = Hash::make($request->oldPassword);

        //Check if the oldPassword from request is same as the exist password in database. If yes, allow the user data to
        //be updated, otherwise return the fail message
        if(Hash::check($user->Password, $oldPassword)){
            $user->password = Hash::make($request->newPassword);
            $user->email = $request->email;
            $res = $user->update();
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
