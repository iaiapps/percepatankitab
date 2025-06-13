<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // custom login
    public function tokenlogin(Request $request)
    {
        $request->validate([
            'no_hp' => 'required',
            'token_code' => 'required',
        ]);

        // Coba ambil user berdasarkan phone dan custom_token
        $user = User::where('no_hp', $request->no_hp)
            ->where('token_code', $request->token_code)
            ->first();

        if ($user) {
            Auth::login($user);
            return redirect()->intended('home');
        }


        return redirect()->route('landing')->with([
            'loginbuy' => 'Nomor HP atau Token salah',
        ]);
    }
}
