@extends('layouts.main')
@section('content')

<form action="{{ route('logout') }}" method="post">
    @csrf
    <button>Logout</button>
</form>

Welcome

@can('admin')
you wonderful person!
@elsecan('role', 'moderator')
moderator.
@else
you person.
@endcan

@endsection