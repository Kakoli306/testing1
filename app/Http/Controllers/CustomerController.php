<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Expenses;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;

class CustomerController extends Controller
{
    public function save( Request $request){

        $customers = new Customer();
        $customers->account_name = $request->account_name;
        $customers->description = $request->description;
        $customers->category_id = $request->category_id;
        $customers->income_amount = $request->income_amount;
        $customers->status = $request->status;
        $customers->date = Carbon::now();
        $customers->user_id = Auth::user()->id;
        $customers->save();

        return redirect()->route('information')
            ->with('message','Information created successfully');
    }

    public function information(){


   $customers = Customer::select(
                DB::raw('(income_amount) as sums'),
                DB::raw('(date) as dates'),
                DB::raw('(account_name) as name'),
                DB::raw('(description) as description'),
                DB::raw('(category_id) as category'),
                DB::raw('(status) as status')
            )
                ->orderBy('dates','desc')
                ->get();
    

        $expenses = Expenses::select(
            DB::raw('(expense_amount) as exp'),
            DB::raw('(date) as dates'),
            DB::raw('(account_name) as name'),
            DB::raw('(description) as description'),
            DB::raw('(category_id) as category'),
            DB::raw('(status) as status')
        )
            ->orderBy('dates','desc')
            ->get();

            $news = collect($customers)->merge($expenses);
            $merged = $news->sortBy('dates');

          $res = $merged->sortBy(function ($merged) {
                    return $merged->dates;
//dd($res) ;   

});

        return view('information',compact('res'));
    }

    public function pdfview(Request $request)
    {
        $customers = Customer::select(
            DB::raw('(income_amount) as sums'),
            DB::raw('(date) as dates'),
            DB::raw('(account_name) as name'),
            DB::raw('(description) as description'),
            DB::raw('(category_id) as category'),
            DB::raw('(status) as status')
        )
            ->orderBy('dates','desc')
            ->get();


    $expenses = Expenses::select(
        DB::raw('(expense_amount) as exp'),
        DB::raw('(date) as dates'),
        DB::raw('(account_name) as name'),
        DB::raw('(description) as description'),
        DB::raw('(category_id) as category'),
        DB::raw('(status) as status')
    )
        ->orderBy('dates','desc')
        ->get();

        $news = collect($customers)->merge($expenses);
        $merged = $news->sortBy('dates');

      $res = $merged->sortBy(function ($merged) {
                return $merged->dates;
//dd($res) ;   

});

{
    view()->share('res',$res);


        if($request->has('download')){
            $pdf = PDF::loadView('new');
            return $pdf->download('new.pdf');
        }

        return view('new');
    }
    }

}
