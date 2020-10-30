@extends('layouts.main')
@section('content')
@foreach ($errors->all() as $error)
<div class="error">{{ $error }}</div>
@endforeach

<form action="{{ route('register') }}" method="post">
@csrf

<input type="text" name="name" value="{{ old('name') }}" placeholder="Name">

<input type="email" name="email" value="{{ old('email') }}" placeholder="Email">

<input type="password" name="password" value="" placeholder="Password">

<input type="password" name="password_confirmation" value="" placeholder="Password Again">

<button>Register</button>

</form>
@endsection
