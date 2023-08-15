<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller {

    public function login() {
        return view('login');
    }

    public function signup() {
        return view('signup');
    }

    public function user_login(Request $request){
        $data = $request->all();
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function user_signup(Request $request) {
        $request->validate([
            'name'              =>      'required|string|max:20',
            'email'             =>      'required|email|unique:users,email',
            'phone'             =>      'required|numeric|min:10|unique:users,phone',
            'password'          =>      'required|alpha_num|min:6',
            'confirm_password'  =>      'required|same:password',
            'address'           =>      'required|string'
        ]);

        $dataArray = array(
            "name"     => $request->name,
            "email"    => $request->email,
            "phone"    => $request->phone,
            "address"  => $request->address,
            "password" => $request->password
        );
        
        $user = User::create($dataArray);
        if(!is_null($user)) {
            return back()->with("success", "Success! Registration completed");
        }

        else {
            return back()->with("failed", "Alert! Failed to register");
        }
    }
}
