<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeReport;
use Carbon\Carbon;

class CheckInController extends Controller
{
    public function index()
    {
        $employeeId = auth()->user()->id;
        $today = Carbon::now()->format('Y-m-d');
        $employee = EmployeeReport::where('employee_id', $employeeId)
                            ->whereDate('date', $today)->first();
        return view('employee.checkin', compact('today', 'employee'));
        
    }
    public function store(Request $request)
    {
        
        if(!empty($request->id)){
            $checkIn = EmployeeReport::find($request->id);
            $checkIn->check_out = Carbon::now();
            $startTime = Carbon::parse($checkIn->check_in);
            $endTime = Carbon::parse(date("H:i:s"));
            $hoursDifference = $endTime->diffInHours($startTime);
            $checkIn->office_hours = $hoursDifference;
        }else{
            $checkIn = new EmployeeReport();
            $employeeId = auth()->user()->id;
            $checkIn->employee_id = $employeeId;
            $checkIn->check_in = Carbon::now();
            $checkIn->date = date('Y-m-d');
        }
        $checkIn->save();
        return redirect()->back()->with('success', 'Successfully Saved!');
}

}
