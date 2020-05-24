<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\role;
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
            'nick_us'=>['required','string','max:191','unique:users'],
            'nombre_us'=>['required','string','max:191'],
            'app_us'=>['required','string','max:191'],
            'apm_us'=>['required','string','max:191'],
            'rfc_us'=>['required','string','max:191'],
            'rol_us'=>['required','numeric','exists:roles,ID_ROL'],
            'email_us' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contrasena_us' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'nick_us'=>$data['nick_us'],
            'nombre_us'=>$data['nombre_us'],
            'app_us'=>$data['app_us'],
            'apm_us'=>$data['apm_us'],
            'rfc_us'=>$data['rfc_us'],
            'rol_us'=>$data['rol_us'],
            'email_us' => $data['email_us'],
            'contrasena_us' => Hash::make($data['contrasena_us']),
        ]);
    }
    public function showRegistrationForm()
    {
        $role = role::where('ROL','administrador')->first();
        return view('auth.register',compact('role'));
    }


}
