<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeReport;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class EmployeeReportController extends Controller
{
    public function index(Request $request)
    {
         $reports = EmployeeReport::with('user');
        $date = $request->input('todate');
        if(!empty($date)){
            $date = date("Y-m-d", strtotime($date));  
        }else{
            $date = date("Y-m-d");
        }
         $reports = $reports->whereHas('user', function ($query) {
             $query->where('usertype', 'employee');
         })->whereDate('date', $date)->get();
        // $reports = $reports->whereDate('date', $date);
        //  $reports = $reports->get();
        return view('employee_reports.index', compact('reports','date'));
    }
    public function ParticularemployeeList(Request $request, $id){
        $user = User::where('id', $id)->first();
        $report = EmployeeReport::where('employee_id',$id)->get();
        //dd($report);
        return view('employee_reports.particular_report', compact('report','user'));
    }
}
