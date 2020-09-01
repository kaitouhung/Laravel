<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//thư viện session
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

use DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/admin-dashboard');
        }else{
            return Redirect::to('/login')->send();
        }

        
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/login');
    }

    public function showDashboard(){
        $this->AuthLogin();
        return view('admin.admin-dashboard');
        // return Redirect::to('/admin-dashboard');

    }

    public function Dashboard(Request $request){
        $this->AuthLogin();
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);

        $result=DB::table('admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();//lấy 1 user
        // return view('admin.admin-dashboard');
        // echo '<pre>';
        // print_r($result);  
        // echo '</pre>';
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id); 
            return Redirect::to('/admin-dashboard');
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai!');
            return Redirect::to('/login');
        }   
    }
}