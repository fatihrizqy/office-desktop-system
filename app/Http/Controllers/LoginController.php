<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;


class LoginController extends Controller
{
    public function index()
    {
        return view('login',["error"=>false]);
    }
    public function postLogin(Request $request){
        if(Auth::attempt($request->only('name','password'))){
            return redirect('/');
        }
        $error=true;
        return redirect()->route('login')->with('status','Password / Username Salah');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register()
    {
        $model = new Department();
        $department = $model->getdata();
        return view('register',compact('department'));
    }

    public function postRegister(Request $request)
    {
        try {
            $pass = bcrypt($request->password);
            Employee::create([
                'EmpName'=>$request->name,
                'DeptId'=>$request->department,
                'password'=>$pass,
                'status'=>1
            ]);
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$pass,
            ]);
            return redirect('/login');
        } catch (\Throwable $th) {
            return redirect('/register')->with('error','Username / email sudah terdaftar');
        }
        
    }
}
