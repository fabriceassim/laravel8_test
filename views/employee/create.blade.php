@extends('layouts.master')

@section('content')
    <form action="{{ route('employee.store') }}" method="post">
        <div class="input-group">
            <label for="name">First Name</label>
            <input type="text" id="name" name="first_name">
            {{ $errors->first('first_name') }}
        </div>
        <div class="input-group">
            <label for="email">Last name</label>
            <input type="text" id="name" name="last_name">
            {{ $errors->first('last_name') }}
        </div>
        <div class="input-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email">            
        </div>
        {{ csrf_field() }}
        <button type="submit">Sign Up</button>
    </form>
@endsection