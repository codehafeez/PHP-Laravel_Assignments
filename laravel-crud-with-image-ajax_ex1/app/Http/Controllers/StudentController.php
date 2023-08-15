<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    //

    public function index(){
        return view('Student.student');
    }
    public function addStudent(Request $req){
        $validator=Validator::make($req->all(),[
            'name'=> 'required|max:191',
            'email'=> 'required|email',
            'image'=> 'required|image|mimes:jpeg,png,jpg|max:2048',
            'phone'=> 'required|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors(),
            ]);

        }else{
            $student=new Student;
            $student->name=$req->input('name');
            $student->email=$req->input('email');


            if($req->hasFile('image')){
                $file=$req->file('image');
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move('upload/student/', $filename);
                $student->image=$filename;
            }


            $student->phone=$req->input('phone');

            $student->save();
            return response()->json([
                'status'=>200,
                'message'=>'Student data insert successful',
            ]);
        }
    }

    public function getdata(){
        $data=Student::all();
        return response()->json([
            'data'=>$data,
        ]);
       
    }
    public function edit($id){
        $data=Student::find($id);
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function update(Request $req,$id){
        $validator=Validator::make($req->all(),[
            'name'=> 'required|max:191',
            'email'=> 'required|email',
            'image'=> 'required|image|mimes:jpeg,png,jpg|max:2048',
            'phone'=> 'required|max:191',
        ]);
         if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->errors(),
            ]);
        }else{

        $data=Student::find($id);

        if($data){
            $data->name=$req->input('name');
            $data->email=$req->input('email');

            if($req->hasFile('image')){
                $path="upload/student/".$data->image;

                if(File::exists($path)){
                    File::delete($path);
                }
                $file=$req->file('image');
                $extention=$file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                $file->move("upload/student",$filename);
                $data->image=$filename;

            }
            $data->phone=$req->input('phone');
           
            }

             $data->save();
            return response()->json([
                'status'=>200,
                'message'=>"update successful",
             ]);
        }
    }
    public function deleteStudent($id){
        $data=Student::find($id);
        $data->delete();
        return response()->json([
            'message'=>'Student data deleted',
        ]);
    }
}
