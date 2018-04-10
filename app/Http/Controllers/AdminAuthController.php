<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use DB;
use App/Admin;
class AdminAuthController extends Controller
{
    use  ThrottlesLogins;
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    public function index(Request $request)
    {
        
        return view('admin.login');
    }

   
    public function login(Request $request)
    {
    //dd($request->all());
    if(Auth::attempt([
        'email'=>$request->email,
        'password'=>$request->password,

        ])){
        $user=Admin::where('email'=>$request->email)->first();
    if($user)
    {
        return redirect()->route('dashboard');
    }
    else{
        return redirect()->route('home');
    }
    }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($data)
    {
        parse_str($data, $formFields); 
        $formData = array(
            'email'             =>  $formFields['email'],
            'password'          =>  $formFields['password']
            );
        $rules = array(
            'email'             =>  'required|email',
            'password'          =>  'required'
            );
        
        return Validator::make($formData,$rules);
        
    }

    protected function valideRegister($data)
    {
        parse_str($data, $formFields); 
        $formData = array(
            'email'             =>  $formFields['email'],
            'password'          =>  $formFields['password'],
            'name'              =>  $formFields['name']
            );
        $rules = array(
            'email'             =>  'required|email|unique:users',
            'password'          =>  'required',
            'name'              =>  'required'
            );
        
        return Validator::make($formData,$rules);
        
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

   
    
    
}