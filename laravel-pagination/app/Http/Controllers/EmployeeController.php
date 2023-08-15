<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function getData(){
        // $employees = Employee::all();
        // $employees = Employee::latest()->paginate(10);
        $employees = Employee::paginate(8);
        return view('home', compact('employees'));
    }
}