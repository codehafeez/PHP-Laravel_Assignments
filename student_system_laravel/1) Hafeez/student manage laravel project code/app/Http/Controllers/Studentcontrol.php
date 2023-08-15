<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use App\branch;
use App\course;
use App\Fee;
use Illuminate\Support\Facades\DB;

class Studentcontrol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = course::all();
        $branches = branch::all();
        return view('studentregister',compact(['courses','branches']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new student;
        $student->sname = $request->sname;
        $student->fname = $request->fname;
        $student->class = $request->class;
        $student->phnum = $request->phnum;
        $student->email = $request->email;
        $student->course_id = $request->course_id;
        $student->branch_id = $request->branch_id;
        $student->image = $request->file('image')->getClientOriginalName();
        $student->save();

        $request->image->move(public_path('postimg'),$student->image);      
        return redirect('studentregisterform');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if($request->ajax()){
        $student_cols = $request->get('filter');
        if($student_cols){
            $columns = explode(',', $student_cols);
            $student = student::select('id','sname');
            foreach ($columns as $key => $value) {
                $student->addselect($value);
            }
            
            $students = $student->paginate(4);
            return view('studentdetails_ajax', compact('students'));
        }
        else{
            $students = student::select('id','sname')->paginate(4);
            return view('studentdetails_ajax',compact('students'));
        }}
        else{
            $students = student::select('id','sname')->paginate(4);
            return view('studentdetails',compact('students'));
        }
      
    }

    public function ajax_show(Request $request)
    {
        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $search = $request->get('search');
            $search = str_replace(" ", "%", $search);

            $students = student::where('sname', 'like', '%'.$search.'%')
                          ->orWhere('fname', 'like', '%'.$search.'%')
                          ->orderBy($sort_by, $sort_type)
                          ->paginate(3);
            return view('studentdetails_ajax', compact('students'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = student::find($id);
        return view('studentedit',compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = student::find($id);
        $student->sname = $request->sname;
        $student->fname = $request->fname;
        $student->class = $request->class;
        $student->phnum = $request->phnum;
        $student->email = $request->email;
        $student->save();
         return redirect('studentdetails');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = student::find($id);
        $student->delete();
        return redirect('studentdetails');
    }
    public function courses(Request $request){
        $id = $request->id;
        $data['courses'] = Course::where('branch_id',$id)->get();
        echo json_encode($data);
    }
    public function single_student(Request $request){
        $id = $request->id;
        $student = student::where(['id'=>$id])->get();
        //print_r($student[0]['id']);exit();
        return view('student_show',compact('student'));
    }
    public function fee_form(Request $request){
        $id = $request->id;
        $fee = Fee::where(['student_id'=>$id])->get();
        return view('feeform',compact(['fee','id']));
    }
    public function feeadd(Request $request){
        $fee = new Fee;
        $id = $request->id;
        $fee->student_id = $request->id;
        $fee->amount = $request->amount;
        $fee->save();
      
        return redirect(route('student.fee', ['id' => $id]));
    }
}
