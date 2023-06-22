<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class EmployeeController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    public function addEmployee(){
        return view('employee.addemployee');
    }
    public function storeEmployee(Request $request){
        //dd($request->all());
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'password'=>'required',

        ],[
            'username.required'=>'please input your username',
            'email.required'=>'please input your email',
            'password.required'=>'please input your password',
            
        ]);
        User::insert([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'usertype'=>'employee',
        ]);
        User::orderBy('id','desc')->first();
        return redirect()->to('employeeList')->with('success_message','Successfully Data Added');
    }
    public function employeeList(){

        $employees = User::where('usertype', 'employee')->orderBy('id', 'DESC')->get();
       
      
        return view('employee.employeeList',compact('employees'));
       
           
        }
    }
        
