<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\ExpenseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelDataImport;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // Import Excel as collection
        $collections = Excel::toCollection(new class implements WithHeadingRow {
            public function headingRow(): int
            {
                return 1; // First row as heading
            }
        }, public_path('storyassets/story.xlsx'));

        // Get the first sheet safely
        $storyData = $collections->first()->map(function ($row) {
            // Convert each row to plain array and trim all keys
            $rowArray = array_map('trim', $row->toArray());

            // Optional: filter out rows without story_id
            if (!isset($rowArray['story_id']) || empty($rowArray['story_id'])) {
                return null; // will filter out later
            }

            return $rowArray;
        })->filter(); // remove null rows

        return view('layouts.index', compact('storyData'));
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
