@extends('layouts.master') 
@section('custom_css')
@endsection
@section('content')
    <h4>@if(!empty($report)) {{Auth::user()->name}} @endif 's  Report List</h4>
    <form action="{{ url('single-employee-reports/id') }}" method="GET">
        <label for="date">Select Date:</label>
        <input type="date" name="todate" value="{{ date('Y-m-d') }}">
        {{-- <select name="date" id="date"> --}}
            {{-- <option value="{{ date('Y-m-d') }}" selected>{{ date('Y-m-d') }}</option> --}}
        {{-- </select> --}}
        <button type="submit">Show Reports</button>
    </form>

    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Date</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Office Hours</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report as $sinlereport)
                <tr>
                    <td>{{ date('Y-m-d') }}</td>
                    <td>{{ $sinlereport->check_in }}</td>
                    <td>{{ $sinlereport->check_out }}</td>
                    <td>{{ $sinlereport->office_hours }}</td>
                </tr>
                @endforeach
        </tbody>
    </table>
    @endsection

    @section('custom_js')
    
       
    @endsection
    