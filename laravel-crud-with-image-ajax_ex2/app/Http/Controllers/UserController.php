<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $collection = User::get();
        return view('list', [
            'collection' => $collection
        ]);
    }

    //create 
    public function add(Request $request)
    {
        //validate
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'image' => 'required',
        ]);
        //have errors
        if ($validator->fails()) {
            return response()->json([
                'code' => 0,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $image = $request->file('image');

        $newName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/img/'), $newName);
        $user->image = $newName;

        $user->save();
        return response()->json([
            'code' => 1,
        ]);
    }

    //
    public function edit($id)
    {
        $data = User::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }

    //update
    public function update(Request $request, $id)
    {
        //validate
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',

        ]);
        //have errors
        if ($validator->fails()) {
            return response()->json([
                'code' => 0,
                'errors' => $validator->errors()->toArray()
            ]);
        }

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $image = $request->file('image');

        //if image does not exits
        if ($image == '') {
            $user->image =  $request->input('image_hidden');
        } else {
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/img/'), $newName);
            $user->image = $newName;
        }

        $user->save();
        return response()->json([
            'code' => 1,
        ]);
    }


    //delete
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
