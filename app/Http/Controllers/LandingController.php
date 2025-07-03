<?php

namespace App\Http\Controllers;

use App\Models\Quizz;
use App\Models\Landing;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    private function settingD($nama)
    {
        $data = Landing::where('name', $nama)->first();
        return $data->value;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diskon = $this->settingD('diskon');
        $countdown_diskon = $this->settingD('countdown_diskon');
        $besar_diskon = $this->settingD('besar_diskon');
        $harga_awal = $this->settingD('harga_awal');
        $harga_diskon = $this->settingD('harga_diskon');
        //
        $kontak_alamat = $this->settingD('kontak_alamat');
        $kontak_hp = $this->settingD('kontak_hp');
        $kontak_email = $this->settingD('kontak_email');

        $value = [
            'diskon' => $diskon,
            'countdown_diskon' => $countdown_diskon,
            'besar_diskon' => $besar_diskon,
            'harga_awal' => $harga_awal,
            'harga_diskon' => $harga_diskon,
            'kontak_alamat' => $kontak_alamat,
            'kontak_hp' => $kontak_hp,
            'kontak_email' => $kontak_email,

        ];
        // dd($data_value);
        return view('landing', compact('value'));
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

    // handling register form landing page
    // register form buy
    public function formbuy()
    {
        return view('auth.registerbuy');
    }

    // register form reseller
    public function formreseller()
    {
        return view('auth.registerreseller');
    }
    // register form affiliator
    public function formaffiliator()
    {
        return view('auth.registeraffiliator');
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


    // ---------- admin setting landing page ---------- //
    public function settingLanding()
    {
        $landings = Landing::all();
        return view('admin.landing.index', compact('landings'));
    }
    public function settingLandingCreate()
    {
        return view('admin.landing.create');
    }
}
