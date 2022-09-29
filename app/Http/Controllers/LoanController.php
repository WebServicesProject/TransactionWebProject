<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    //

    public function checkLoanRecords(Request $request){
        $uid = $request->session()->get('uid');

        $loanRecords = DB::table('borrow_records')
                ->leftJoin('books','borrow_records.bid','=','books.id')
                ->select('borrow_records.id as id','bid','ISBN','title', DB::raw('date(borrow_time) as loanDate'))
                -> where('uid','=',$uid)
                ->where('is_returned','=',0)
                ->paginate(5);

        return view('check-loan',['loanRecords' => $loanRecords]);
    }

    public function renew($id){
        //get the loan record by id
        $res = DB::table('borrow_records')
            ->where('id','=',$id)
            ->first();

        //check if the record has exceeded the due date. if yes, output fail message, otherwise update the loan date and refresh the
        // page with success message

        $dueDate = date('Y-m-d H:i:s', strtotime($res->borrow_time.'+21 days'));
        $currentTime = date('Y-m-d H:i:s', strtotime('now'));

        if($dueDate < $currentTime){
            return back()->withInput()->with('fail','This book is overdue. Please return it to front-desk firstly and borrow it again!');
        }
        else{
            DB::table('borrow_records')
                ->where('id','=',$id)
                ->update(['borrow_time'=>$currentTime]);
            return back()->withInput()->with('success','This book is renewed!');
        }


    }
}
