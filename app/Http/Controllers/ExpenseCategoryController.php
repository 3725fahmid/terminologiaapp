<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ExpenseCategoryController extends Controller
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
        $expenseCategory = ExpenseCategory::where('created_by', $id)->get();
        return view('frontend.category.index', compact('expenseCategory'));
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
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $userId = Auth::id();

        // 🔹 Check if category already exists for this user
        $exists = ExpenseCategory::where('name', $request->name)
            ->where('created_by', $userId)
            ->exists();

        if ($exists) {
            // 🔹 Send error notification
            return redirect()->back()->with([
                'message'    => 'This category already exists for your account.',
                'alert-type' => 'error'
            ])->withInput();
        }

        // 🔹 Create new category
        ExpenseCategory::create([
            'name'        => $request->name,
            'description' => $request->description,
            'created_by'  => $userId,
            'created_at'  => Carbon::now(),
        ]);

        return redirect('category')->with([
            'message'    => 'Category Created Successfully',
            'alert-type' => 'success',
        ]);
        // $request->validate([
        //     'name'      =>  'required',
        // ]);

        // $category = new ExpenseCategory;

        // $category->name = $request->name;
        // $category->description = $request->description;
        // $category->created_by  =  Auth::user()->id;
        // $category->created_at  = Carbon::now();
        // $category->save();

        // $notification = array(
        //     'message' => 'Category Created Successfully', 
        //     'alert-type' => 'success'
        // );

        // return redirect('category')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseCategory $category)
    {
        //
        // dd($category);
        //$expenseCategory = ExpenseCategory::get();
        return view('frontend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseCategory $category)
    {
        //

        $category->name = $request->name;
        $category->description = $request->description;
        $category->created_by  =  Auth::user()->id;
        $category->created_at  = Carbon::now();
        $category->update();

        $notification = array(
            'message' => 'Category Update Successfully',
            'alert-type' => 'success'
        );

        return redirect('category')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseCategory $category)
    {
        //
        $category->delete();

        $notification = array(
            'message' => 'Category Deleted',
            'alert-type' => 'error'
        );

        return redirect('category')->with($notification);
    }
}
