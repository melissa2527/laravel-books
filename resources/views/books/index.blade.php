<h1>Index of Books</h1>
@foreach($books as $book)
    <h2> {{$book->title}} </h2>
    <p>{{$book->authors}}</p>
    <img src="{{$book->image}}"/>
    <p>
    <a href="{{action('BookController@show', $book->id)}}">Detail</a>
    </p>


@endforeach