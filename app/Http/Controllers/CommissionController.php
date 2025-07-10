<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commissions = Commission::all();
        return view('admin.commission.index', compact('commissions'));
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
    public function show(Commission $commission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commission $commission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commission $commission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commission $commission)
    {
        $commission->delete();
        return back();
    }

    // handle paid commission
    public function commissionPay(Request $request)
    {
        $now = Carbon::now();
        $commission = Commission::where('id', $request->id)->first();
        $commission->update([
            'status' => 'paid',
            'paid_at' => $now,
        ]);

        return back();
    }

    // handle rekap
    public function rekap()
    {
        $start = Carbon::now()->subWeek()->startOfWeek(Carbon::SATURDAY);
        $end = Carbon::now()->subDay()->endOfDay(); // Jumat

        $commissions = Commission::with('referral.user', 'payment.user')
            ->where('status', 'pending')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        $total = $commissions->sum('nominal');

        return view('admin.commission.rekap', compact('commissions', 'total', 'start', 'end'));
    }

    // handle pay weekly
    public function commissionPayWeekly(Request $request)
    {
        // Hitung minggu ini: dari Sabtu lalu hingga Jumat ini
        $start = Carbon::now()->subWeek()->startOfWeek(Carbon::SATURDAY);
        $end = Carbon::now()->subDay()->endOfDay();

        $commissions = Commission::where('status', 'pending')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        foreach ($commissions as $commission) {
            $commission->update([
                'status' => 'paid',
                'paid_at' => now(),
            ]);
        }

        return redirect()->route('admin.commission.rekap')->with('success', '✅ Semua komisi minggu ini telah dibayarkan.');
    }
}
