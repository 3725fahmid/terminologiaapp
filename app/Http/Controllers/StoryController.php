<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelDataImport;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // // // 1. Load the Excel data into Collections
        // // // Using 'toArray' or 'toCollection' converts the rows into arrays
        // // Import using the 'heading' feature to ensure keys like 'user_id' exist
        // $usersData = Excel::toCollection(new class implements WithHeadingRow {
        //     public function headingRow(): int
        //     {
        //         return 1;
        //     }
        // }, public_path('storyassets/user.xlsx'))->first();

        // $addressesData = Excel::toCollection(new class implements WithHeadingRow {
        //     public function headingRow(): int
        //     {
        //         return 1;
        //     }
        // }, public_path('storyassets/addresses.xlsx'))->first();

        // $usersWithAddress = $usersData->map(function ($user) use ($addressesData) {
        //     // 1. Convert the $user (which is currently a collection) into an array
        //     $userArray = $user instanceof \Illuminate\Support\Collection ? $user->toArray() : (array) $user;

        //     // 2. Perform the relation lookup
        //     $address = $addressesData->where('user_id', $userArray['user_id'])->first();

        //     // 3. Attach the address
        //     $userArray['address'] = $address;

        //     // 4. IMPORTANT: Convert to an object so you can use ->name in Blade
        //     return (object) $userArray;
        // });

        // // dd($usersWithAddress);

        // return view('story.index', ['users' => $usersWithAddress]);


        // ENDSSSSSSSSSSS

        //
        // $data = Excel::toCollection(new ExcelDataImport, public_path('storyassets/data.xlsx'));

        // // Excel structure:
        // // $data[0] = first sheet
        // // $data[0][0] = first row (header)

        // $rows = collect($data[0]);

        // // Optional: remove header row
        // $header = $rows->shift();
        // // dd($header);

        // return view('story.index',compact('rows', 'header'));
    }

    public function storydata($id)
    {

        // Import the Excel file
        $collections = Excel::toCollection(new class implements WithHeadingRow {
            public function headingRow(): int
            {
                return 1; // First row as heading
            }
        }, public_path('storyassets/story.xlsx'));

        // Get the first sheet as array of rows
        $storyData = $collections->first()->map(function ($row) {
            return array_map('trim', $row->toArray());
        });

        // Find the story with the matching story_id
        $story = $storyData->firstWhere('story_id', $id);

        // Optional: handle case if story not found
        if (!$story) {
            abort(404, 'Story not found');
        }

        // dd($story);
        // Pass the story to a Blade view
        return view('story.index', compact('story'));
        // return view('story.index', ['users' => $usersWithAddress]);

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
        dd($id);
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
