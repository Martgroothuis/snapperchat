<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'pubkey' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $pubkey = User::where('pubkey', $data['pubkey'])->value('pubkey');;

        $passphrase = User::where('pubkey', $pubkey)->value('passphrase');;

        $hashedPassPhrase = Hash::make($data['passphrase']);


        if (Hash::check($data['passphrase'], $passphrase)) {


            return User::where('pubkey', $pubkey)->update([
                'username' => $data['username'],
                'pubkey' => $data['pubkey'],
                'passphrase' => $hashedPassPhrase,
                'password' => Hash::make($data['password']),
                'admin' => 0,
            ]);

        } else {

            return User::create([
                'username' => $data['username'],
                'pubkey' => $data['pubkey'],
                'passphrase' => $hashedPassPhrase,
                'password' => Hash::make($data['password']),
                'admin' => 0,
            ]);
        }
    }
}
