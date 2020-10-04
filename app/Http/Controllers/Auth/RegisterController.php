<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Customer;
use App\Department;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'digits:8'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{3})/'],
            'address' => ['required', 'string', 'min:4'],
            'postcode' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'name' => $data['name'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
         ]);

        $user->assignRole('user');

        $customer = Customer::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'user_id' => $user->id,
        ]);

        $address = Address::create([
            'postcode' => $data['postcode'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'customer_id' => $customer->id,
        ]);

        return $user;
    }

    public function showRegistrationForm()
    {
        $departments = Department::all();
        return view('auth.register', compact('departments'));
    }
}
