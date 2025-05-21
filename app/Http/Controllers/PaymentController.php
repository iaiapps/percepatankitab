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
        $users = User::where('id', '!=', 1)->where('id', '!=', 2)->get();
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
        // dd($request->all());
        // get data pembayaran
        $id = $request->user_id;
        $name = $request->name;

        //validate upload bukti pembayaran
        $imgDocument = $request->validate([
            'document' => 'required|file|image|mimes:jpeg,jpg,png|max:1024',
        ]);

        //beri nama
        $file = $request->file('document');
        $file_name = $name . '-pembayaran' . '-' . time() . '-' . $file->getClientOriginalName();

        // simpan di folder public
        $request->file('document')->move(public_path('img-pembayaran'), $file_name);

        //masukkan ke array validate
        $imgDocument['user_id'] = $id;
        $imgDocument['name'] = $name;
        $imgDocument['img'] = $file_name;


        //simpan ke database
        Payment::create($imgDocument);

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
        $role = User::where('id', $id)->first();
        $role->syncRoles('user');

        Payment::where('user_id', $id)->update([
            'token_code' => Str::random(10),
        ]);
        return redirect()->back()->with('success', 'berhasil mengubah data!');
    }
}
