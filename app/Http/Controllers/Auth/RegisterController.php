<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Payment;
use App\Models\Reseller;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Referral;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    // disable register.blade
    public function showRegistrationForm()
    {
        // return view('auth.register');
        return redirect()->route('landing');
    }
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // validasi formbuy
        $formbuy = $data['formbuy'];

        if ($formbuy == 'passwordformbuy') {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'no_hp' => ['required'],
                'type' => ['required'],
            ]);
        } else {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'same:password'],
                'no_hp' => ['required'],
                'type' => ['required'],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // cek ref
        $ref = $data['ref'] ?? null;

        // validasi formbuy
        $formbuy = $data['formbuy'];
        // validasi reseller type
        $formtype = $data['type'];

        if ($formbuy == 'passwordformbuy') {
            $password =  Hash::make('passwordformbuy');
            $status = null;
        } else {
            $password =  Hash::make($data['password']);
            $status = 1;
        }

        $create =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
            'no_hp' => $data['no_hp'],
            'address' => $data['address'],
            'type' => $data['type'],
            'ref_code' => $ref,
            'status' => $status,
        ]);

        if ($formtype == 'pembeli') {
            $create->assignRole('guest');

            // buat data payment
            $user_id = $create->id;
            Payment::create([
                'user_id' => $user_id,
                'name' => $data['name'],
                'kode_referral' => $ref,
                'status' => 'pending',
            ]);
        } elseif ($formtype == 'reseller') {
            $create->assignRole('reseller');

            $user_id = $create->id;
            $str = Str::random(5);
            Referral::create([
                'user_id' => $user_id,
                'tipe' => 'reseller',
                'kode_referral' => 'RES' . Str::upper($str),
            ]);
        } elseif ($formtype == 'affiliator') {
            $create->assignRole('affiliator');

            $user_id = $create->id;
            $str = Str::random(5);
            Referral::create([
                'user_id' => $user_id,
                'tipe' => 'affiliator',
                'kode_referral' => 'AFF' . Str::upper($str),
            ]);
        }

        return $create;
    }
}
