<?php

namespace App\Http\Controllers;

use App\Models\Reseller;
use Illuminate\Http\Request;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resellers = Reseller::all();
        return view('admin.reseller.index', compact('resellers'));
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
    public function show(Reseller $reseller)
    {
        $kode_referral = $reseller->kode_referral;

        dd($reseller->kode_referral);

        return view('admin.reseller.show', compact('reseller'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reseller $reseller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reseller $reseller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reseller $reseller)
    {
        //
    }
}
