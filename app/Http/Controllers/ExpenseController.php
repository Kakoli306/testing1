<?php

namespace App\Http\Controllers;

use App\Expenses;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
class ExpenseController extends Controller
{
    public function expense( Request $request){

        $expenses = new Expenses();
        $expenses->account_name = $request->account_name;
        $expenses->description = $request->description;
        $expenses->category_id = $request->category_id;
        $expenses->expense_amount = $request->expense_amount;
        $expenses->status = $request->status;
        $expenses->date = Carbon::now();
        $expenses->user_id = Auth::user()->id;
        $expenses->save();

        return redirect()->route('information')
            ->with('message','Information created successfully');
    }

    


}
