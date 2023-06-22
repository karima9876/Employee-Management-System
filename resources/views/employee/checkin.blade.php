@extends('layouts.master') 
@section('custom_css')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            @include('messages')
            <h4>Employee Check-In</h4>
            <p>{{ date('d F, Y') }}</p>
            <form action="{{url('check-in-store')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="@if(!empty($employee->id)){{$employee->id}}@endif">
                @if(empty($employee->check_in))
                    <button type="submit" class="btn btn-success">Check-In</button>
                @else
                    <button class="btn btn-primary">Checkout</button>
                 @endif
            </form>
        </div>
    </div>
@endsection
@section('custom_js') 
@endsection



