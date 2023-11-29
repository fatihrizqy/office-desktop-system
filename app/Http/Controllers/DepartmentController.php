<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use DB;
use Auth;
class DepartmentController extends Controller
{
    public function index()
    {

        $query = 'SELECT d.DeptName, d.DepartementId, c.countryName FROM departments d INNER JOIN countries c ON d.CountryId=c.CountryId WHERE d.status=1;';
        $department = DB::select($query);
        $id = auth()->user()->name;
        $user = DB::select("SELECT DeptId from employees WHERE EmpName='{$id}'")[0]->DeptId;
        return view('department',compact('department','user'));
    }

    public function createDepartment()
    {
        $query = 'SELECT CountryName,CountryId FROM countries';
        $country = DB::select($query);
        return view('createDepartment',compact('country'));
    }
    
    public function postDepartment(Request $request)
    {
        Department::create([
            'DeptName'=>$request->nama,
            'CountryId'=>$request->negara,
            'status'=>1
        ]);
        return redirect('/department');
    }

    public function softDelete(Request $request)
    {
        $query = "SELECT EmpId FROM employees WHERE DeptId='{$request->id}'";
        $employee = DB::select($query);
        foreach ($employee as $e){
            DB::update("UPDATE folders f SET status=0 WHERE f.EmpId={$e->EmpId}");
            DB::update("UPDATE employees e SET status=0 WHERE e.EmpID={$e->EmpId}");
        }
        DB::update("UPDATE departments d SET status=0 WHERE d.DepartementId={$request->id}");
        return redirect()->route('department')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function permanentDelete(Request $request)
    {
        $query = "SELECT EmpId FROM employees WHERE DeptId={$request->id}";
        $employee = DB::select($query);
        foreach ($employee as $e){
            DB::delete("DELETE FROM folders  WHERE EmpId={$e->EmpId}");
            DB::update("DELETE FROM employees  WHERE EmpID={$e->EmpId}");
        }
        DB::update("DELETE FROM  departments  WHERE DepartementId={$request->id}");
        return redirect()->route('department')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function searchDepartmentPost(Request $request)
    {
        $query = (" SELECT d.DeptName, d.DepartementId, c.countryName FROM departments d INNER JOIN countries c ON d.CountryId=c.CountryId WHERE d.status=1 AND d.DeptName LIKE '%$request->nama%';"); 
        $department = DB::select($query);
        $id = auth()->user()->name;
        $user = DB::select("SELECT DeptId from employees WHERE EmpName='{$id}'")[0]->DeptId;
        return view('searchDepartment',compact('department','user'));
    }

    public function editDepartment(Request $request)
    {
        $query = (" SELECT d.DeptName, d.DepartementId, c.countryName, c.CountryId FROM departments d INNER JOIN countries c ON d.CountryId=c.CountryId WHERE d.status=1 AND d.DepartementId='{$request->slug}';"); 
        $department = DB::select($query);
        $query = 'SELECT CountryName,CountryId FROM countries';
        $country = DB::select($query);
        return view('editDepartment',compact('department','country'));

    }

    public function updateDepartment(Request $request)
    {
       DB::table('departments')
              ->where('DepartementId', $request->id)
              ->update(['DeptName' => "{$request->nama}",'CountryId'=>$request->negara]);
        return redirect('/department');
    }

}
