<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\ExpenseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ExpenseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->id;
        $expenses =  ExpenseItem::with('category')
        ->where('user_id', $id)
        ->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.expense.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $id = Auth::user()->id;
        $expenseCategory =  ExpenseCategory::where('created_by', $id)->get();
        return view('frontend.expense.create',compact('expenseCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        foreach($request->title as $key => $value) {
            $date = trim($request->date);
            $dateTime = Carbon::parse($date, 'Asia/Dhaka');
            $ExpenseItem = new ExpenseItem;
            $ExpenseItem->expense_date = $dateTime;
            $ExpenseItem->expense_title = $request->title[$key];
            $ExpenseItem->amount = $request->amount[$key];
            $ExpenseItem->user_id = Auth::user()->id;
            $ExpenseItem->category_id = $request->category[$key];
            $ExpenseItem->note = $request->note[$key];
            $ExpenseItem->save();
        }

        $notification = array(
            'message' => 'Expenses Save Successfully', 
            'alert-type' => 'success'
        );

        return redirect('expense')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseItem  $expenseItem
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseItem $expenseItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseItem  $expenseItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseItem $expense)
    {
        //
        // dd($expense);
        $id = Auth::user()->id;
        $expenseCategory =  ExpenseCategory::where('created_by', $id)->get();
        return view('frontend.expense.edit',compact('expense','expenseCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseItem  $expenseItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseItem $expense)
    {
        //
            $expense->expense_date = $request->date;
            $expense->expense_title = $request->title;
            $expense->amount = $request->amount;
            $expense->category_id = $request->category;
            $expense->note = $request->note;
            $expense->update();

        $notification = array(
            'message' => 'Expense Update Successfully', 
            'alert-type' => 'success'
        );

        return redirect('expense')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseItem  $expenseItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseItem $expense)
    {
        //
        $expense->delete();

        $notification = array(
            'message' => 'Expense Deleted',
            'alert-type' => 'error'
        );

        return redirect('expense')->with($notification);
    }
}
