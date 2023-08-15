<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\StudentModel;
class StudentController extends Controller
{

    public function load(){
        // $students = StudentModel::all(); // show all data
        $students = StudentModel::paginate(4);
        return view('students',compact('students'));
    }

    public function register(){
        return view('register');
    }

    public function store(Request $request) {
        $student = new StudentModel;
        $student->sname = $request->sname;
        $student->fname = $request->fname;
        $student->class = $request->class;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->image = $request->file('image')->getClientOriginalName();
        $student->save();
        $request->image->move(('uploads'),$student->image);      
        return redirect('dashboard');
    }

    public function edit($id) {
        $students = StudentModel::find($id);
        return view('detail',compact('students'));
    }

    public function update(Request $request, $id) {
        $student = StudentModel::find($id);
        $student->sname = $request->sname;
        $student->fname = $request->fname;
        $student->class = $request->class;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();
        return redirect('dashboard');
    }

    public function destroy($id){
        $student = StudentModel::find($id);
        $student->delete();
        return redirect('dashboard');
    }
}
