<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;
use Session;
use App\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
   
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    
   /* public function __construct()
    {
        $this->middleware('auth');
    }*/
    /*public function index()
    {
        return view('admin.dashboard');
    }*/
    public function index()
    {
        $admins= DB::table('tbl_webusers')->get();
        $roles=DB::table('tbl_roles')->get();
        $locations=DB::table('tbl_locations')->get();
        $arrayName = array('roles' => $roles, 'locations'=>$locations,'admins'=>$admins,);
        return view('admin.admin_users.index')->with($arrayName);
    }
    
    public function loginform()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        ///dd($request->all());
        /*if(Auth::attempt([
        'email'=>$request->email,
        'password'=>$request->password,

        ])){*/
         $user= Admin::where(array('email'=>$request->email,'password'=>$request->email))->first();
     //dd($user);
        if($user)
        {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('adminlogin');
        }
      //  }
       
     

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=DB::table('tbl_roles')->get();
        $locations=DB::table('tbl_locations')->get();
        $arrayName = array('roles' => $roles, 'locations'=>$locations);
        return view('admin.admin_users.add')->with($arrayName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * name   email   phone   password    status  role 
     */



    public function store(Request $request)
    {
       
       $name = $request->input('name');
       $email = $request->input('email');
      // $today = date("y/m/d");
       $phone = $request->input('phone');
       $password = bcrypt($request->input(['password']));
       $role = $request->input('role');
       $location = $request->input('location');
      $data=DB::insert("insert into tbl_webusers(name,email,phone,password,role,location) values('$name','$email','$phone','$password','$role','$location')");
      Session::flash('message','Record Inserted Successfully');
      return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        $update_admins = Admin::where('id',$id)->get();
        
        //dd($data);
        $roles=DB::table('tbl_roles')->get();
        $locations=DB::table('tbl_locations')->get();
        $arrayName = array('roles' => $roles, 'locations'=>$locations,'update_admins'=>$update_admins);
        return view('admin.admin_users.edit')->with($arrayName);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $name = $request->input('name');
        $id = $request->input('id');
        $email = $request->input('email');
      // $today = date("y/m/d");
         $phone = $request->input('phone');
        $password = $request->input('password');
        $role = $request->input('roles');
         $location = $request->input('location');
      
     $data= DB::update("UPDATE `tbl_webusers` SET `name`='$name',`email`='$email',`phone`='$phone',`password`='$password',`role`='$role',`location`='$location' WHERE `id`= $id");
     Session::flash('message','Record Updated Successfully!!');
     return  redirect()->action('AdminController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_admin= Admin::find($id)->delete();
        //$request->session()->flash('message'=>'Record Deleted Successfully');
       Session::flash('message', 'Record Deleted Successfully!!');
       return  redirect()->action('AdminController@index');
      
         
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function logout()
    {
       Auth::logout();

       return redirect()->route('home');
    }
}  
