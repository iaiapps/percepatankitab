<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /** @var \App\Models\User */

        $user = Auth::user();
        $role = $user->getRoleNames()->first();
        $payment = Payment::all();
        $users = User::all();

        // dd($role);
        if ($role == 'admin' or $role == 'operator' or $role == 'reseller' or $role == 'affiliator') {
            return view('home.home', compact('users', 'payment'));
        } elseif ($role == 'guest') {
            return view('guest.guest', compact('user'));
        } elseif ($role == 'user') {
            return view('home.home', compact('user'));
        } else {
            return abort('401');
        };
    }
}
