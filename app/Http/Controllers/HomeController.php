<?php

namespace App\Http\Controllers;

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

        if ($role == 'admin' or $role == 'operator') {
            return view('home.home');
        } elseif ($role == 'guest') {
            return view('guest.guest', compact('user'));
        } elseif ($role == 'user') {
            return view('home.home', compact('user'));
        } else {
            return 'anda tidak punya akses';
        };
    }
}
