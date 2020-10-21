<h1>{{$genre->name}}</h1>
<img src="{{$genre->image}}">

<button><a href="{{action('GenreController@index')}}">Back to Genres</a></button>