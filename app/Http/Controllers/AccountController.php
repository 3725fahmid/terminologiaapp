<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\ExpenseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userId = Auth::id();
        $Balance = Account::where('user_id', $userId)->paginate(10);

        $totalBalance = Account::where('user_id', $userId)->sum('balance');
        $ExpenseBalance = ExpenseItem::where('user_id', $userId)->sum('amount');

        $availableBalance = $totalBalance - $ExpenseBalance;

        // dd($Balance);

        $startOfMonth = Carbon::now()->copy()->startOfMonth();
        $endOfMonth = Carbon::now()->copy()->endOfMonth();
        // dd($startOfMonth);

        $monthExpenses = ExpenseItem::with('category')->where('user_id', $userId)->whereBetween('expense_date', [$startOfMonth, $endOfMonth])->get();
            // Prepare for ApexChart: Group by category and sum
            $grouped = $monthExpenses->groupBy(function ($item) {
                return $item->category->name ?? 'Uncategorized';
            })->map(function ($items) {
                return $items->sum('amount');
            });

        $labels = $grouped->keys();
        $data = $grouped->values();

        return view('frontend.account.index', compact('Balance','availableBalance', 'totalBalance', 'labels', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        // dd($request);
        $account = new Account;
        $account->user_id = Auth::user()->id;
        $account->balance = $request->balance;
        $account->account_comment = $request->account_comment;
        $account->save();

        $notification = array(
            'message' => 'Balance Added Successfully', 
            'alert-type' => 'success'
        );

        return redirect('account')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
        return view('frontend.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
        $account->delete();

        $notification = array(
            'message' => 'Account balance Deleted',
            'alert-type' => 'error'
        );

        return redirect('account')->with($notification);
    }
}
