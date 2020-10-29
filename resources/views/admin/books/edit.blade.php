@extends('admin.layouts.main')

@section('content')

{{-- display success message --}}
@if (Session::has('success_message'))

    <div class="alert alert--success">{{ Session::get('success_message') }}</div>

@endif

{{-- display errors --}}
@if ($errors->count())

    @foreach ($errors->all() as $error)

        <div class="alert alert--error">{{ $error }}</div>

    @endforeach

@endif

<form action="{{ route('admin.books.update', $book->id) }}" method="post">
    @csrf
    @method('put')

    <div class="form-group">
        <label for="">Title</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}">
    </div>

    <div class="form-group">

        <h3>Genres</h3>

        @foreach ($genres as $genre)

            <label>
                <input 
                    type="checkbox" 
                    {{ $book_genre_ids->contains($genre->id) ? ' checked' : '' }} 
                    name="genre[{{ $genre->id }}]" 
                    value="1"
                >
                {{ $genre->name }}
            </label>

        @endforeach

    </div>

    <button>Save</button>

</form>

@endsection