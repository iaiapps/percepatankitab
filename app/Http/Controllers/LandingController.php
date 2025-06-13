<?php

namespace App\Http\Controllers;

use App\Models\Quizz;
use App\Models\Landing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Landing $landing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Landing $landing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Landing $landing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Landing $landing)
    {
        //
    }

    // handling form buy
    public function formbuy()
    {
        return view('auth.registerbuy');
    }


    // handling quizz //
    public function quizzdata()
    {
        return view('quizz.quizzdata');
    }

    public function quizzdatastore(Request $request)
    {
        // $request->all();
        $str = Str::random(10);
        $data_validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
        ]);
        $data_validate['str'] = $str;

        Quizz::create($data_validate);
        return redirect()->route('quizz', $str);
    }

    public function quizz(Request $request)
    {
        $str = $request->str;
        return view('quizz.quizz', compact('str'));
    }
    public function quizzstore(Request $request)
    {
        $score = $request->score;
        $str = $request->str;
        $user = Quizz::where('str', $str)->get()->first();
        $user->update([
            'score' => $score,
        ]);
        // dd(?$score);
        return redirect()->route('quizzscore', $str);
    }

    public function quizzscore(Request $request)
    {
        $str = $request->str;
        $quizz = Quizz::where('str', $str)->get()->first();
        return view('quizz.quizzscore', compact('quizz'));
    }
}
