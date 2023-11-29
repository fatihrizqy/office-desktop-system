<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;
class EmployeeController extends Controller
{
    public function index()
    {
        $query = 'SELECT e.EmpName, d.DeptName FROM employees e INNER JOIN departments d ON e.deptId=d.DepartementId ;';
        $employee = DB::select($query);
        return view('employee',compact('employee'));
    }
}
