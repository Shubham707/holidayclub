<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Session;
use App\User;
use DB;
/**
 * Class DashboardController
 * @package App\Http\Controllers\Backend
 */
class DashboardController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {

  		$data=[
			'pageTitle'=>'Dashboard'
		];

  		return view('admin.dashboard',$data);
    }
    public function profile(Request $request){
        $socialData =  \App\Admin::where('user_id',Auth::Admin()->id)->get();

        $data=[
          'pageTitle'   =>'Dashboard',
          'socialData'  =>  $socialData
        ];
        return view('admin.profile',$data);
    }  
}