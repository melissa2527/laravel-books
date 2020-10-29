@extends('admin.layouts.main')
@section('content')
<table>
    <thead>
        <th>#</th>
        <th>Title</th>
    </thead>

    <tbody>
        @foreach ($books as $book)

            <tr>
                <td>{{$book->id}}</td>
                <td>
                    <a href="{{route('admin.books.edit', $book->id)}}">
                    {{$book->title}} </a>
                </td>
            <tr>
        @endforeach
    </tbody>
</table>
@endsection