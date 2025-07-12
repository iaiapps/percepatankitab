<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Referral;
use App\Models\Reseller;
use App\Models\Commission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

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

    // lihat bukti
    public function showimg(Payment $paymentimg)
    {
        $payment = $paymentimg;
        return view('admin.payment.showimg', compact('payment'));
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
            'activated_at' => now(),
        ]);
        // create commission
        $tipe_pembelian = $request->tipe_pembelian;
        $get_referral = Referral::where('kode_referral', $payment->kode_referral)->first();
        if ($tipe_pembelian == 'reseller') {
            $nominal = '50000';
        } elseif ($tipe_pembelian == 'affiliator') {
            $nominal = '12000';
        } else {
            $nominal = '-';
        }
        // dd($tipe_pembelian);
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
        if (!$payment->wa_notified && $user->no_hp) {
            $phone = preg_replace('/[^0-9]/', '', $user->no_hp);
            $message = "Assalamualaikum warahmatullah wabarakatuh,
            \nHai {$user->name},
            \n✅ Pembayaran Anda telah diverifikasi.
            \nSelamat! Akun Anda telah aktif dan bisa mengakses semua kelas.
            \n🔑 Token Akses: *{$token_code}*
            \nSilakan masuk kelas untuk mulai belajar.";

            Http::withHeaders([
                'Authorization' => 'DQtfjXYnP1B185nrQAX2'
            ])->post('https://api.fonnte.com/send', [
                'target' => $phone,
                'message' => $message,
                'countryCode' => '62',
            ]);

            $payment->update([
                'wa_notified' => true,
                'wa_sent_at' => now(),
            ]);
        }
        return redirect()->back()->with('success', 'berhasil update data!');
    }

    // download doc
    public function downloadDoc(Payment $payment)
    {
        // Render view seperti biasa (include layout + section)
        $html = view('admin.payment.show', compact('payment'))->render();

        // Load DOM
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        libxml_clear_errors();

        // Ambil elemen dengan ID 'print-area'
        $element = $dom->getElementById('print-area');

        if (!$element) {
            return response('Element dengan ID print-area tidak ditemukan', 404);
        }

        // Ambil isi anak-anak elemen
        $innerHtml = '';
        foreach ($element->childNodes as $child) {
            $innerHtml .= $dom->saveHTML($child);
        }

        // Tambahkan style dasar
        $styles = "
        <style>
            body { font-family: Arial, sans-serif; font-size: 12pt; }
            .border { border: 1px solid #000; padding: 10px; }
            .p-3 { padding: 1rem; }
            .mb-0 { margin-bottom: 0; }
            .mb-3 { margin-bottom: 1rem; }
            hr { border: 1px solid #ccc; }
        </style>
    ";

        // Bungkus jadi file Word
        $wordDoc = "
        <html xmlns:o='urn:schemas-microsoft-com:office:office'
              xmlns:w='urn:schemas-microsoft-com:office:word'
              xmlns='http://www.w3.org/TR/REC-html40'>
        <head><meta charset='utf-8'>{$styles}</head>
        <body>{$innerHtml}</body>
        </html>
    ";

        return Response::make($wordDoc, 200, [
            'Content-Type' => 'application/msword',
            'Content-Disposition' => 'attachment; filename="alamat-pengiriman.doc"',
        ]);
    }
}
