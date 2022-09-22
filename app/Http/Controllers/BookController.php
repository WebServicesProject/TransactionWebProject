<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    //

    public function search($searchBy,$searchText){

        //get books by variable $searchby and $searchText provided by search form on the search page
        switch ($searchBy){
            case 1:
                $books = DB::table('books')
                    ->where('ISBN','like','%'.$searchText.'%')
                    ->paginate(5);
                break;
            case 2:
                $books = DB::table('books')
                    ->where('title','like','%'.$searchText.'%')
                    ->paginate(5);
                break;
            case 3:
                $books = DB::table('books')
                    ->where('category','like','%'.$searchText.'%')
                    ->paginate(5);
                break;
            default:
                $books = DB::table('books')
                    ->where('ISBN','like','%'.$searchText.'%')
                    ->orwhere('title','like','%'.$searchText.'%')
                    ->orWhere('category','like','%'.$searchText.'%')
                    ->paginate(5);
        }

        Session::put('searchText',$searchText);
        Session::put('searchBy',$searchBy);

        return view('book-search',compact('books'));
    }

    public function borrow(Request $request, $bookid){

        $searchText = Session::get('searchText');
        //query the book with bookid from table "books" in order to get the quantity of the book
        $book = DB::table('books')
            ->where('id','=', $bookid)
            ->first();


        //check if there are stock for borrow
        $quantity = $book->quantity;
        $uid = $request->session()->get('uid');

        if($quantity > 0){
            //check if the borrow record has existed
            if(DB::table('borrow_records')
                        ->where('uid','=',$uid)
                        ->where('bid','=',$bookid)
                        ->exists()){
//
                //reshowing the book list
               return back()->withInput()->with('fail','You have borrowed this book. Only one is allowed per user');
            }else{
                //insert a borrow record into table "borrow_records"
                DB::table('borrow_records')->insert(
                    [  'uid'=> $request->session()->get('uid'),
                        'bid'=>$bookid
                    ]
                );

                //decrease the quantity of the book by 1
                DB::table('books')
                    ->where('id','=',$bookid)
                    ->update(['quantity'=>$quantity-1]);
                $message = "You have borrowed " . $book->title;
                return back()->withInput()->with('success',$message);
            }
        }else{
//            echo '<script type=text/javascript>alert("The book is out of stock")</script>';
//            echo "out of stock";
           return back()->withInput()->with('fail','The book is out of stock');
//            return $this->fuzzySearch($searchText);
        }


    }
}
