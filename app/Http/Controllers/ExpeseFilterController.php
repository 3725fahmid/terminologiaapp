<?php

namespace App\Http\Controllers;

use App\Models\ExpenseItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpeseFilterController extends Controller
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
        $now = Carbon::now();
        // --- THIS YEAR & PREVIOUS YEAR ---
        $startOfYear = $now->copy()->startOfYear();
        $endOfYear = $now->copy()->endOfYear();

        $expenseDate = ExpenseItem::where('user_id', $id)->whereBetween('expense_date', [$startOfYear, $endOfYear])
        ->get()
        ->unique(function ($item) {
            return Carbon::parse($item->expense_date)->format('Y-m-d');
        })
        ->values();

        // $expenseMonth = ExpenseItem::where('user_id', $id)->whereBetween('expense_date', [$startOfYear, $endOfYear])
        // ->get()
        // ->unique(function ($item) {
        //     return Carbon::parse($item->expense_date)->format('Y-m');
        // })
        // ->values();

        $expenseMonth = ExpenseItem::selectRaw('DISTINCT DATE_FORMAT(expense_date, "%Y-%m") as month')
        ->where('user_id', auth()->id())
        ->orderBy('month', 'desc')
        ->get();

        $expenseYear = ExpenseItem::selectRaw('DISTINCT DATE_FORMAT(expense_date, "%Y") as year')
        ->where('user_id', auth()->id())
        ->orderBy('year', 'desc')
        ->get();

        // dd($expenseMonth);

        return view('frontend.expensefilter.index', compact('expenseDate','expenseMonth','expenseYear'));
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

    public function filter(Request $request)
    {


        $userId = auth()->id();

        // 🔹 Base query: select category + sum(amount) for the logged-in user
        $query = ExpenseItem::with('category')
            ->select('category_id', DB::raw('SUM(amount) as total_price'))
            ->where('user_id', $userId)
            ->groupBy('category_id');

        // 🔹 Filter by specific day (if provided)
        if ($request->filled('dayfilterdate')) {
            $query->whereDate('expense_date', Carbon::parse($request->dayfilterdate));
        }

        // 🔹 Filter by specific month (if provided, expects format "Y-m")
        if ($request->filled('monthfilterdata')) {
            $month = Carbon::createFromFormat('Y-m', $request->monthfilterdata);
            $query->whereYear('expense_date', $month->year)
                ->whereMonth('expense_date', $month->month);
        }

        // 🔹 Filter by specific month (if provided, expects format "Y-m")
        if ($request->filled('yearfilterdata')) {
            $year = Carbon::createFromFormat('Y', $request->yearfilterdata);
            $query->whereYear('expense_date', $year->year);
        }

        // 🔹 Fetch results, then map each row to [category, total_price]
        // Example: [ 'category' => 'Transport', 'total_price' => 300 ]
        $merged = $query->get()
            ->map(fn($item) => [
                'category'    => optional($item->category)->name ?? 'Unknown',
                'total_price' => $item->total_price,
            ])
            // 🔹 Regroup by category name to merge duplicates
            ->groupBy('category')
            ->map(fn($items) => [
                'category'    => $items->first()['category'],
                'total_price' => collect($items)->sum('total_price'),
            ]);

        // 🔹 Return JSON formatted for chart (labels + data arrays)
        return response()->json([
            'labels' => $merged->pluck('category')->values(),    // e.g. ["Transport", "Food", "Medicine"]
            'data'   => $merged->pluck('total_price')->values(), // e.g. [330, 570, 520]
        ]);
    }


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
