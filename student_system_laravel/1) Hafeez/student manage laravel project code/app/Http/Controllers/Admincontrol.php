<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use Session;

class Admincontrol extends Controller
{
    public function adminlogin(){
    	return view('adminlogin');
    }
    public function adminloged(Request $request){
    	$admin = admin::where('username',$request->username)->where('password',$request->password)->get()->toArray();
    	if ($admin) {
          $request->session()->put('admin_session',$admin[0]['id']);
          return redirect('dashbord/');
      }
      else{
        session::flash('coc','Email and Password not match');
        return redirect('/loginpage/')->withInput();
      }
    }
    public function dashbord(){
    	return view('dashbord');
    }
}
