<h1>{{$book->title}}</h1>
<h2>{{$book->authors}}</h2>
<button><a href="{{route('books')}}">Back to the index</a></button>
<button><a href="/books/{{$book->id}}/edit">Edit Book</a></button>

{{-- <form action="/books/{{$book->id}}/edit" method="POST">
    <button>Edit Book</button>
</form> --}}

<form action="/books/{{$book->id}}" method="POST">
    @csrf
    @method('DELETE')
    <button>Delete Book</button>
</form>

<img src="{{$book->image}}" alt="{{$book->title}}">


<h3>Reviews</h3>

@if ($errors->count())
    @foreach ($errors->all() as $error)
        <div class="alert alert-error">{{$error}}</div>
    @endforeach
@endif

<form method="post" action="{{action('BookController@review', [$book->id])}}">
    @csrf
    <label for="">Write your review:
    <input type="textarea" name="text" id="">
    </label>
    <label for="">Enter a Rating (1-100)
    <input type="number" name="rating" placeholder="Rating">
    </label>
    <button type="submit"><a href="">Submit</a></button>
</form>
   
@foreach($book->reviews as $review)
<hr/>
<p>{{$review->text}}</p>
<p>{{$review->rating}}/100</p>
@endforeach

