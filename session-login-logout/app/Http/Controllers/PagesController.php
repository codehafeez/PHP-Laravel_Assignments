<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class PagesController extends Controller
{
    public function index(Request $request){
      if($request->session()->has('my_name')){
         $name = $request->input('name');
         return view('home')->with('session_name', $name);
      }
      else { return view('index'); }
    }

   public function login(Request $request) {
      $name = $request->input('name');
      if($name == "Hafeez"){ $request->session()->put('my_name',$name); }

      if($request->session()->has('my_name')) { return view('home')->with('session_name', $name); }
      else { return view('index'); }
   }


   public function logout(Request $request) {
      $request->session()->forget('my_name');
      return view('index');
   }

}
