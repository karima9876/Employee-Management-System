@extends('layouts.master') 
@section('custom_css')
@endsection
@section('content')
@include('messages')
            <div class="btn-group right" style="float:right;padding-top:25px;margin-bottom:25px">
                <a href="{{ URL::to('/addemployee') }}" class="btn btn-primary"> Add Employee</a>
            </div>
            <table class="table table-striped">
              <tbody>
              </tbody>
              @if(isset($employees))
                @foreach($employees as $employee)
                    <tr>
                      <td>{{$employee->name}}</td>
                    </tr>
                @endforeach
              @endif 
            </table> 
@endsection

@section('custom_js')

   
@endsection