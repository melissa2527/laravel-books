
    <h1>Index of Books</h1>

    <button><a href="{{action('BookController@create')}}">Add a Book</a></button>

    @foreach($books as $book)
    <h2> {{$book->title}} </h2>
    <p>{{$book->authors}}</p>
    <img src="{{$book->image}}"/>
    <p>
        <a href="{{action('BookController@show', $book->id)}}">Detail</a>
        </p>
    @endforeach
    
    

    <div class="reviews">
        @foreach ($book->reviews as $review)
        {{$review->text}}<br>
        {{$review->star_value}} stars
        {{$review->rating}}
        @endforeach
    </div>
