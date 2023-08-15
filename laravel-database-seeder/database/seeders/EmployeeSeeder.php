<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
class EmployeeSeeder extends Seeder
{
    public function run()
    {
        Employee::create([
            'name' => 'John Doe',
            'email' => 'doejohn@gmail.com',
            'phone' => '1234567890',
            'department' => 'hr',
            'dob' => '2010-01-03',
        ]);
    }
}
