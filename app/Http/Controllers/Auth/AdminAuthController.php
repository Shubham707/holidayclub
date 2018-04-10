<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
class AdminAuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
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

    public function registerForm(Request $request)
    {
        $data=[
        'pageTitle'=>'Darwinsurance Admin Register'
        ];
        return view('admin.auth.register')->with($data);
    }

    public function showLoginForm(Request $request)
    {
/*        $code = $request->get('code');
        if(!empty($code))
        {
            $this->loginWithFacebook($request);

            return redirect()->route('admin.profile');
        }*/

        $data=[
        'pageTitle'=>'Darwinsurance Admin Login'
        ];
        return view('admin.auth.login')->with($data);
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

    public function login(Request $request)
    {
        $successMessage=null;
        $errorMessage=null;
        $error=TRUE;
        $success=FALSE;
        $plainMessage=null;

        $inputData=$request->input(['formData']);
        parse_str($inputData, $formFields); 

        if(!$this->validator($inputData)->fails())
        {
            if (Auth::attempt(['email' => $formFields['email'], 'password' => $formFields['password']]))
            {
                $successMessage='Succesfully LoggedIn';
                $error=FALSE;
                $success=TRUE;

            }
            else
            {
                $plainMessage='Invalid Login Details';
            }
        }
        else
        {
                $errorMessage=$this->validator($inputData)->errors();

        }
        return response()->json(['error' => $error,'success'=>$success,'successmessage' => $successMessage,'errorsmessage'=>$errorMessage,'plainMessage'=>$plainMessage]);

    }

    public function registerFromData(Request $request)
    {
        $successMessage=null;
        $errorMessage=null;
        $error=TRUE;
        $success=FALSE;
        $plainMessage=null;

        $inputData=$request->input(['formData']);
        parse_str($inputData, $formFields); 

        if(!$this->valideRegister($inputData)->fails())
        {
            $user=$this->create($formFields);
            Auth::loginUsingId($user->id);
            $successMessage='Account Created Succesfully';
            $errorMessage=null;
            $error=FALSE;
            $success=TRUE;
            $plainMessage=null;
        }
        else
        {
            $errorMessage=$this->valideRegister($inputData)->errors();

        }
        return response()->json(['error' => $error,'success'=>$success,'successmessage' => $successMessage,'errorsmessage'=>$errorMessage,'plainMessage'=>$plainMessage]);

    }
    
    public function loginWithFacebook($request)
    {
            // get data from request
        $code = $request->get('code');

        // get fb service
        $fb = \OAuth::consumer('Facebook');

        // if code is provided get user data and sign in
        if ( ! is_null($code))
        {
            // This was a callback request from facebook, get the token
            try{

                $token = $fb->requestAccessToken($code);

                // Send a request with it
                $result = json_decode($fb->request('/me?fields=name,email,gender,id,picture,age_range,locale,friends,context.fields(mutual_friends)'), true);
                $friendsdata=[];
                /*dd($friendsdata);
                dd($result);*/
                $age=!empty($result['age_range']['min'])?$result['age_range']['min']:0;
                $userData=[
                    'facebook_id' => $result['id'],
                    'name'=>!empty($result['name'])?$result['name']:"",
                    'email'=>!empty($result['email'])?$result['email']:"",
                    'age'=>$age,
                    'gender'=>!empty($result['gender'])?$result['gender']:"",
                    'picture'=>!empty($result['picture']['data']['url'])?$result['picture']['data']['url']:""
                ];
                //echo "hello";die;
                $findUser=\App\User::where('email',$result['email'])->where('facebook_id',$result['id'])->first();
                $socialdata=\App\UserSocial::where('email',$result['email'])->where('social_type','facebook')->where('facebook_id',$result['id'])->first();
                if(is_null($findUser))
                {
                    $insertedData=\App\User::create($userData);
                    $userId=$insertedData->id;
                    $userData['user_id']=$userId;
                    $userData['social_type']="facebook";
                    \App\UserSocial::create($userData);
                    if(isset($result['friends']))
                    {
                        if(isset($result['friends']['data']))
                        {
                            foreach($result['friends']['data'] as $value)
                            {
                                $data= array('friends_facebook_id'=>$value['id'],'user_id'=>$insertedData->id,'friends_facebook_name'=>$value['name']);
                                \App\UsersFacebookFriends::create($data);

                            }
                        }
                    }
                }
                else
                {
                    $userId=$findUser->id;
                    $facebookData=[
                        'facebook_id'   =>  $userData['facebook_id']
                    ];
                    $userData['user_id']=$userId;
                    $userData['social_type']="facebook";
                    if(is_null($socialdata))
                        \App\UserSocial::create($userData);

                    User::whereId($userId)->update($facebookData);
                }
                return Auth::loginUsingId($userId);
            }
            catch(\Exception $e) {
                return redirect()->route('admin.auth.login');
            }
        }
    }

    public function logout()
    {
       Auth::logout();

       return redirect()->route('admin.auth.login');
    }
}