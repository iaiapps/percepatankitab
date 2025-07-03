<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;

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
}
