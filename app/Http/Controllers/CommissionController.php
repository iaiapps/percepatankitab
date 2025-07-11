<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Referral;
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

        $resellerCommissions = $commissions->where('referral.user.type', 'reseller');
        $affiliatorCommissions = $commissions->where('referral.user.type', 'affiliator');

        // Group by referral name
        $resellerGrouped = $resellerCommissions->groupBy(fn($item) => $item->referral->user->name ?? 'Unknown');
        $affiliatorGrouped = $affiliatorCommissions->groupBy(fn($item) => $item->referral->user->name ?? 'Unknown');

        $totalReseller = $resellerCommissions->sum('nominal');
        $totalAffiliator = $affiliatorCommissions->sum('nominal');
        $total = $totalReseller + $totalAffiliator;
        return view('admin.commission.index', compact(
            'commissions',
            'resellerGrouped',
            'affiliatorGrouped',
            'totalReseller',
            'totalAffiliator',
            'total',

        ));
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
        $start = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $end = Carbon::now()->endOfWeek(Carbon::SATURDAY);

        $commissions = Commission::with('referral.user', 'payment.user')
            ->where('status', 'pending')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        $resellerCommissions = $commissions->where('referral.user.type', 'reseller');
        $affiliatorCommissions = $commissions->where('referral.user.type', 'affiliator');

        // Group by referral name
        $resellerGrouped = $resellerCommissions->groupBy(fn($item) => $item->referral->user->name ?? 'Unknown');
        $affiliatorGrouped = $affiliatorCommissions->groupBy(fn($item) => $item->referral->user->name ?? 'Unknown');

        $totalReseller = $resellerCommissions->sum('nominal');
        $totalAffiliator = $affiliatorCommissions->sum('nominal');
        $total = $totalReseller + $totalAffiliator;

        return view('admin.commission.rekap', compact(
            'resellerGrouped',
            'affiliatorGrouped',
            'totalReseller',
            'totalAffiliator',
            'total',
            'start',
            'end'
        ));
    }


    // handle pay weekly
    public function commissionPayWeekly(Request $request)
    {
        // Hitung minggu ini: dari Sabtu lalu hingga Jumat ini
        $start = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $end = Carbon::now()->endOfWeek(Carbon::SATURDAY);

        $commissions = Commission::where('status', 'pending')
            ->whereBetween('created_at', [$start, $end])
            ->get();

        // Kelompokkan komisi berdasarkan referral
        $commissionsByReferral = $commissions->groupBy('referral_id');

        foreach ($commissionsByReferral as $referralId => $items) {
            $totalForReferral = $items->sum('nominal');

            // Update komisi masing-masing menjadi 'paid'
            foreach ($items as $commission) {
                $commission->update([
                    'status' => 'paid',
                    'paid_at' => now(),
                ]);
            }

            // Tambahkan total komisi ke referral
            $referral = Referral::find($referralId);
            if ($referral) {
                $referral->increment('total_komisi', $totalForReferral);
            }
        }
        return redirect()->route('commissions.rekap')->with('success', 'Semua komisi minggu ini telah dibayarkan.');
    }
}
