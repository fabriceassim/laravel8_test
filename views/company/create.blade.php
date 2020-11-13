@extends('layouts.master')

@section('content')
    <form action="{{ route('company.store') }}" method="post">
        <div class="input-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            {{ $errors->first('name') }}
        </div>
        <div class="input-group">
            <label for="email">email</label>
            <input type="text" id="email" name="email">
            {{ $errors->first('name') }}
        </div>
        <div class="input-group">
            <label for="file">file</label>
            <input type="file" id="file" name="file">
        </div>    

        {{ csrf_field() }}
        <button type="submit">Sign Up</button>
    </form>
@endsection