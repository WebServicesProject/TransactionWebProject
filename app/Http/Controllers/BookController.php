<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //

    public function fuzzySearch(Request $request){

//        $userId = $request->session()->get('userId');
//        $username = $request->session()->get('username');
//        dd($userId,$username);

        $data = DB::table('books')
            ->where('ISBN','like','%'.$request->searchText.'%')
            ->orwhere('title','like','%'.$request->searchText.'%')
            ->paginate(5);

        return view('testdata',['data'=>$data]);
    }

//    public function borrow(Request $request){
//
//    }
}
