@extends('layouts.master') 
@section('custom_css')
@endsection
@section('content')
      <h4>Add New Employee</h4>
      <form id="accountForm" action="{{url('employee/store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
        </div>
    
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        </div>
    
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
        </div>
    
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
      @endsection
@section('custom_js') 
@endsection
   