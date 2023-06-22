<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeReportController;
use App\Http\Controllers\CheckInController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('owner')->group(function () {
    //Employee add
    Route::get('/addemployee',[EmployeeController::class,'addEmployee'])->name('addemployee');
    Route::post('/employee/store',[EmployeeController::class,'storeEmployee'])->name('employee.store');
    Route::get('/employeeList',[EmployeeController::class,'employeeList'])->name('employeelist');
    //Employee report
     Route::get('/employee-reports',[EmployeeReportController::class,'index'])->name('employee.reports.index');
     Route::get('/single-employee-reports/{id}',[EmployeeReportController::class,'ParticularemployeeList'])->name('single-employee-reports');
});





Route::middleware('employee')->group(function () {
//check-in
Route::get('/check-in', [CheckInController::class,'index'])->name('check-in');
Route::post('/check-in-store', [CheckInController::class,'store'])->name('check-in-store');
});





