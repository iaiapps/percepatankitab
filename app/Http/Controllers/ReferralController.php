<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referrals = Referral::all();
        return view('admin.referral.index', compact('referrals'));
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
    public function show(Referral $referral)
    {
        return view('admin.referral.show', compact('referral'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Referral $referral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Referral $referral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Referral $referral)
    {
        //
    }

    // reseller
    public function reseller()
    {
        $resellers = Referral::where('tipe', 'reseller')->get();
        return view('admin.referral.reseller', compact('resellers'));
    }
    // affiliator
    public function affiliator()
    {
        $affiliators = Referral::where('tipe', 'affiliator')->get();
        return view('admin.referral.affiliator', compact('affiliators'));
    }

    // aktivasi referral
    // public function activatereferral(Request $request)
    // {
    //     $id = $request->id;
    //     $referral = Referral::where('id', $id)->first();
    //     $user = $referral->user;
    //     $user->update([
    //         'status' => '1'
    //     ]);
    //     return redirect()->back()->with('success', 'berhasil mengubah data!');
    // }

    // update data bank
    public function databank()
    {
        $id = Auth::user()->id;
        $referral = Referral::where('user_id', $id)->first();
        // dd($referral);
        return view('referral.databank', compact('referral'));
    }

    public function storedatabank(Referral $referral, Request $request)
    {
        $referral->update([
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening
        ]);
        return redirect()->route('profile');
    }
}
