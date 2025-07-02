<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Reseller;
use App\Models\Commission;
use App\Models\Referral;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('id', '!=', 2)->where('type', '!=', 'reseller')->where('type', '!=', 'affiliator')->get();
        $payments = Payment::all();
        return view('admin.payment.index', compact('payments'));
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
        // Validasi data, ini sudah jadi satu request
        $validatedData = $request->validate([
            'user_id'  => 'required|exists:users,id',
            'name'     => 'required|string|max:255',
            'document' => 'required|file|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        // Proses file upload
        $file = $request->file('document');
        $fileName = $validatedData['name'] . '-pembayaran-' . time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('img-pembayaran'), $fileName);

        // Siapkan data untuk disimpan
        $paymentData = [
            'name'   => $validatedData['name'],
            'img'    => $fileName,
            'status' => 'pending',
        ];

        // Simpan atau update berdasarkan user_id
        Payment::updateOrCreate(
            ['user_id' => $validatedData['user_id']], // cari berdasarkan user_id
            $paymentData // update/isi data
        );
        // kembali ke payment
        return redirect()->route('home')->with('success', 'Bukti Pembayaran berhasil diupload!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        // dd($payment);
        return view('admin.payment.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }

    // aktifkan pembayaran user
    public function activate(Request $request)
    {
        // get data
        $id = $request->id;
        $payment = Payment::where('id', $id)->first();
        $user = User::where('id', $payment->user_id)->first();
        $user->syncRoles('user');
        $token_code = mt_rand(10000, 99999);
        // update payment
        $payment->update([
            'token_code' => $token_code,
            'status' => 'verified',
            'kode_referral' => $user->ref_code,
        ]);
        // update token user
        $user->update([
            'token_code' => $token_code,
        ]);
        // create commission
        $tipe_pembelian = $request->tipe_pembelian;
        $get_referral = Referral::where('kode_referral', $payment->kode_referral)->first();
        if ($tipe_pembelian == 'reseller') {
            $nominal = '50.000';
        } elseif ($tipe_pembelian == 'affiliator') {
            $nominal = '12.000';
        }
        if ($get_referral) {
            Commission::updateOrCreate(
                [
                    'referral_id' => $get_referral->id,
                    'payment_id' => $payment->id,
                ],
                [
                    'kode_referral' => $payment->kode_referral,
                    'nominal' => $nominal,
                    'status' => 'pending',
                ]
            );
        }

        return redirect()->back()->with('success', 'berhasil mengubah data!');
    }
}
