@extends('layouts.master') 
@section('custom_css')
@endsection
@section('content')
    <h4>Username:{{$user->name }}'s  Report List</h4>

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
                    <td>{{ $sinlereport->date  }}</td>
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
    