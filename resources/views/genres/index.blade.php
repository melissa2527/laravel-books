<h1>Genres</h1>

<ul>
    @foreach($genres as $genre)
    <p>{{$genre->name}}</p>
    <img src="{{$genre->image}}">
<button><a href="{{$genre->id}}">Details</a></button>
    @endforeach
</ul>