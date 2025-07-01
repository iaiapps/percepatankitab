<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
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
        return view('admin.payment.index', compact('users'));
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
        $id = $request->id;
        $user = User::where('id', $id)->first();
        $user->syncRoles('user');


        // $str = Str::random(5);
        // fungsi generate angka 10000-99999
        $token_code = mt_rand(10000, 99999);

        // // cek dulu sek
        // if (isset($user->ref_code)) {
        //     $word = Str::take($user->ref_code, 3);

        //     if ($word == 'RES') {
        //     }
        // } else {
        // }

        // update payment
        Payment::where('user_id', $id)->update([
            'token_code' => $token_code,
            'status' => 'verified',
            'kode_referral' => $user->ref_code,
        ]);
        // uodate token user
        $user->update([
            'token_code' => $token_code,
        ]);

        return redirect()->back()->with('success', 'berhasil mengubah data!');
    }
}
