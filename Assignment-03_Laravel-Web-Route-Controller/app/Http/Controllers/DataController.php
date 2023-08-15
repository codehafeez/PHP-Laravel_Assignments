<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class DataController extends Controller
{
    public function fun1(){  
        return 'data function 1';
    }  

    public function fun2($id, $name){
        return "data function 2 => id:$id = name:$name";
    }
    public function fun3(){  
        $users = [
            ['name' => 'John Doe', 'email' => 'john@example.com'],
            ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
        ];
        return $users;
    }
}
