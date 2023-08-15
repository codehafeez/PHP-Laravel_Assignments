<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\AdminModel;
use Session;
class AdminController extends Controller {

    public function login(){
      if(!session()->has('login_session')){ return view('login'); }
      return view('dashboard');
    }

    public function islogin(Request $req){
    	$result = AdminModel::where('username', $req->username)->where('password', $req->password)->get()->toArray();
    	if($result){
    		$req->session()->put('login_session', $result[0]['id']);
    		return redirect('dashboard');
    	}
    	else {
    		session::flash('error_msg', 'Username or Password Incorrect');
    		return redirect('login');
    	}
    }

    public function logout() {
        session()->forget('login_session');
        return view('login');
    }
}
