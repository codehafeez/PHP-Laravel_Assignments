<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller {

    public function create() {
        return view('signup');
    }

    public function store(Request $request) {
        $request->validate([
            'name'              =>      'required|string|max:20',
            'email'             =>      'required|email',
            'phone'             =>      'required|numeric|min:10',
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
