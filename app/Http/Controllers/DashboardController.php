<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = DB::select(DB::raw('SELECT f.FolderId, f.AccessType, e.EmpName, d.DeptName, c.CountryName, c.Continent
        FROM EMPLOYEES e
        INNER JOIN DEPARTMENTS d
        ON e.DeptId=d.DepartementId
        INNER JOIN COUNTRIES c
        ON c.CountryId=d.CountryId
        INNER JOIN FOLDERS f
        ON f.EmpId=e.EmpId;'));
        return view("home",compact('data'));
    }

}
