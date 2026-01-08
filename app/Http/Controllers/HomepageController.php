<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\ExpenseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        
            $id = Auth::user()->id;
            $now = Carbon::now();

            // This week's period (Monday to Sunday)
            $startOfWeek = $now->copy()->startOfWeek();
            $endOfWeek = $now->copy()->endOfWeek();

            // Previous week's period (Monday to Sunday)
            $startOfPreviousWeek = $startOfWeek->copy()->subWeek();
            $endOfPreviousWeek = $endOfWeek->copy()->subWeek();

            // Current week's total expenses
            $totalThisWeek = ExpenseItem::where('user_id', $id)->whereBetween('expense_date', [$startOfWeek, $endOfWeek])
                ->sum('amount');

            // Previous week's total expenses
            $previousWeekTotal = ExpenseItem::where('user_id', $id)->whereBetween('expense_date', [$startOfPreviousWeek, $endOfPreviousWeek])
                ->sum('amount');

            // Calculate difference and percentage change
            $weekDiff = $totalThisWeek - $previousWeekTotal;

            $weekpercentageChange = $previousWeekTotal > 0 ? number_format(($weekDiff / $previousWeekTotal) * 100, 2) : null;


            // --- TODAY & PREVIOUS DAY ---
            $today = $now->copy()->startOfDay();
            $yesterday = $now->copy()->subDay()->startOfDay();

            $todayTotal = ExpenseItem::where('user_id', $id)->whereDate('expense_date', $today)->sum('amount');
            $yesterdayTotal = ExpenseItem::where('user_id', $id)->whereDate('expense_date', $yesterday)->sum('amount');

            $todayDiff = $todayTotal - $yesterdayTotal;
            $todayPercentChange = $yesterdayTotal > 0
            ? number_format(($todayDiff / $yesterdayTotal) * 100, 2)
            : null;

            // --- THIS MONTH & PREVIOUS MONTH ---
            $startOfMonth = $now->copy()->startOfMonth();
            $endOfMonth = $now->copy()->endOfMonth();
            $startOfPrevMonth = $now->copy()->subMonth()->startOfMonth();
            $endOfPrevMonth = $now->copy()->subMonth()->endOfMonth();

            $thisMonthTotal = ExpenseItem::where('user_id', $id)->whereBetween('expense_date', [$startOfMonth, $endOfMonth])->sum('amount');
            $prevMonthTotal = ExpenseItem::where('user_id', $id)->whereBetween('expense_date', [$startOfPrevMonth, $endOfPrevMonth])->sum('amount');

            $monthDiff = $thisMonthTotal - $prevMonthTotal;
            $monthPercentChange = $prevMonthTotal > 0
            ? number_format(($monthDiff / $prevMonthTotal) * 100, 2)
            : null;

            // --- THIS YEAR & PREVIOUS YEAR ---
            $startOfYear = $now->copy()->startOfYear();
            $year = $startOfYear->year;
            $endOfYear = $now->copy()->endOfYear();
            $startOfPrevYear = $now->copy()->subYear()->startOfYear();
            $endOfPrevYear = $now->copy()->subYear()->endOfYear();

            $thisYearTotal = ExpenseItem::where('user_id', $id)->whereBetween('expense_date', [$startOfYear, $endOfYear])->sum('amount');
            $prevYearTotal = ExpenseItem::where('user_id', $id)->whereBetween('expense_date', [$startOfPrevYear, $endOfPrevYear])->sum('amount');

            $yearDiff = $thisYearTotal - $prevYearTotal;
            $yearPercentChange = $prevYearTotal > 0
            ? number_format(($yearDiff / $prevYearTotal) * 100, 2)
            : null;


            // For Apex chart 

            //Summary of the year

            $thisyearExpenses = ExpenseItem::with('category')->where('user_id', $id)->whereBetween('expense_date', [$startOfYear, $endOfYear])->get();
            
            // Prepare for ApexChart: Group by category and sum
            $grouped = $thisyearExpenses->groupBy(function ($item) {
                return $item->category->name ?? 'Uncategorized';
            })->map(function ($items) {
                return $items->sum('amount');
            });
            
            $labels = $grouped->keys();
            $data = $grouped->values();

            // For All Expenses Chart 
            $allExpenses = ExpenseItem::with('category')->where('user_id', $id)->get();
            $groupedExpensesByCategory = $allExpenses->groupBy(function ($item) {
                return $item->category->name ?? 'Uncategorized';
            })->map(function ($items) {
                return $items->sum('amount');
            });

            $expenseCategoryLabels = $groupedExpensesByCategory->keys();
            $expenseCategorySums = $groupedExpensesByCategory->values();





            //End Apex chart 

            // Current month Expenses 
            $CurrentmonthExpenses = ExpenseItem::with('category')->where('user_id', $id)->whereBetween('expense_date', [$startOfMonth, $endOfMonth])->get();
            // Prepare for ApexChart: Group by category and sum
            $grouped = $CurrentmonthExpenses->groupBy(function ($item) {
                return $item->category->name ?? 'Uncategorized';
            })->map(function ($items) {
                return $items->sum('amount');
            });

            $CMlabels = $grouped->keys();
            $CMdata = $grouped->values();

            // dd($CMdata);
            // Last 10 expenses 

            $lastfewExpenses = ExpenseItem::with('category')
            ->where('user_id', auth()->id()) // or use $id if passed
            ->orderBy('expense_date', 'desc') // most recent first
            ->take(10)
            ->get();
            // dd($lastfewExpenses);
        
            $totalBalance = Account::where('user_id', $id)->sum('balance');
            $ExpenseBalance = ExpenseItem::where('user_id', $id)->sum('amount');

            $availabaleBalance = $totalBalance - $ExpenseBalance;
        // Pass variables to view
        return view('layouts.index', compact(
            'availabaleBalance',
            'todayTotal',
            'yesterdayTotal',
            'todayDiff',
            'todayPercentChange',
            'totalThisWeek',
            'previousWeekTotal',
            'weekDiff',
            'weekpercentageChange',
            'thisMonthTotal',
            'prevMonthTotal',
            'monthDiff',
            'monthPercentChange',
            'thisYearTotal',
            'prevYearTotal',
            'yearDiff',
            'yearPercentChange',

            'year',
            'labels',
            'data',

            'expenseCategoryLabels',
            'expenseCategorySums',

            'lastfewExpenses',

            'CMlabels',
            'CMdata'

        ));

    }
    // public function index()
    // {
    //     //
    //     return view('backend.index');
    // }

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
