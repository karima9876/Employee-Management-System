@extends('layouts.master') 
@section('custom_css')
@endsection
@section('content')
    <h1>Employee Reports</h1>
    <form action="{{ route('employee.reports.index') }}" method="GET">
        <label for="date">Select Date:</label>
        <input type="date" name="todate" value="{{$date}}">
        {{-- <select name="date" id="date"> --}}
            {{-- <option value="{{ date('Y-m-d') }}" selected>{{ date('Y-m-d') }}</option> --}}
        {{-- </select> --}}
        <button type="submit">Show Reports</button>
    </form>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Office Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td><a href="{{url('/single-employee-reports', $report->employee_id)}}">{{ $report->user->name }}</a></td>
                    <td>{{ $report->check_in }}</td>
                    <td>{{ $report->check_out }}</td>
                    <td>{{ $report->office_hours }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection

    @section('custom_js')
    
       
    @endsection