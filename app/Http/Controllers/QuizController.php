<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $wordData = Cache::remember('story_words', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story_words.xlsx'));

            return $collections->first()->map(function ($row) {
                return array_map('trim', $row->toArray());
            });
        });

        // Get ALL words where story_id = 1
        $words = $wordData->where('story_id', 1)->values();

        if ($words->isEmpty()) {
            abort(404);
        }

        // dd($words->word);

        // "id" => "1"
        // "story_id" => "1"
        // "word" => "Brave"
        // "easy_spelling" => "Brave"
        // "wordmeaning" => "Showing courage and confidence"
        // "synonyms" => "Courageous, Bold"
        // "antonyms" => "Cowardly, Afraid"
        // "tactic" => "Remember heroes are brave"
        // "example" => "He was brave during the storm."

        return view('quiz.index', compact('words'));
    }


    public function dragDrop($id)
    {
        //

        $wordData = Cache::remember('story_words', 3600, function () {
            $collections = Excel::toCollection(new class implements WithHeadingRow {
                public function headingRow(): int
                {
                    return 1;
                }
            }, public_path('storyassets/story_words.xlsx'));

            return $collections->first()->map(function ($row) {
                return array_map('trim', $row->toArray());
            });
        });

        // Get ALL words where story_id = 1
        $words = $wordData->where('story_id', $id)->values();

        if ($words->isEmpty()) {
            abort(404);
        }

        // dd($words->word);

        // "id" => "1"
        // "story_id" => "1"
        // "word" => "Brave"
        // "easy_spelling" => "Brave"
        // "wordmeaning" => "Showing courage and confidence"
        // "synonyms" => "Courageous, Bold"
        // "antonyms" => "Cowardly, Afraid"
        // "tactic" => "Remember heroes are brave"
        // "example" => "He was brave during the storm."

        return view('quiz.dragableqn', compact('words'));
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
