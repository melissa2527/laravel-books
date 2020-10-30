@extends('layouts.main')
@section('content')

@foreach ($errors->all() as $error)
<div class="error">{{$error}}</div>
@endforeach

<form action="{{ route('login') }}" method="post">
    @csrf
 
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
 
    <input type="password" name="password" value="" placeholder="Password">
 
    <button>Login</button>
 
</form>

@endsection