<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoldController extends Controller
{

    // ---------- handle reseller ---------- //
    public function soldByReseller()
    {
        $user = Auth::user();
        $kode_referral = $user->referral->kode_referral;
        $payments = Payment::where('kode_referral', $kode_referral)->get();
        return view('referral.sold', compact('payments'));
    }

    public function commissionByReseller()
    {
        $user = Auth::user();
        $kode_referral = $user->referral->kode_referral;
        $commissions = Commission::where('kode_referral', $kode_referral)->get();
        return view('referral.commission', compact('commissions'));
    }
}
