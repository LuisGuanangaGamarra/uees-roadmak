<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;


use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

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
    protected $redirectTo = '/';

    /**
     * lCreate a new controller instance.
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
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){

        //REGISTRAR EL USUARIO EN LARAVEL
        $user = User::create([
            'name' => $data['name'],
            'lastname'=> $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
           //Aqui se define que tenga el roll de cliente 
        $role_cliente = Role::where('slug', 'cliente')->first();
        $user->roles()->attach($role_cliente);
        
        //REGISTRAR EL USUARIO EN PRESTASHOP
            //aqui hacer el consumo de post
        $client = new Client([
            'base_uri' => 'http://localhost:3988/api/',
            'timeout'  => 2.0,
        ]);

            //crear cliente post
        $response = $client->request('POST', 'register_laravel', [
            'form_params' => [
                'name' =>       $user->name,
                'lastname' =>   $user->lastname,
                'email' =>      $user->email,
                'password' =>   $user->password ,
            ]
        ]);

      
       

       // $path = '/var/www/html/uees-roadmak/storage/images/'.$idempresa.'/'.$filename;     
                //enviar los parametros ejemplo: $user->name;
                //consumir 
                //vivir
        //fin del consumo del post

        // $user
        // ->roles()
        // ->attach(Role::where('name', 'user')->first());

        return $user;
    }
    protected function createcarpeta(array $data){
        
        
       
       
    }
}
