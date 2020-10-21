<h1>Edit a Book: {{$book->title}}</h1>
<p>{{$book->authors}}</p>
<p>{{$book->genre}}</p>

<form method="put" action="{{action('BookController@index')}}">
@csrf
    <input type="text" name="title" id="" placeholder="title">
    <input type="text" name="authors" id="" placeholder="author">
    <input type="text" name="genre" id="" placeholder="genre">
    <button type="submit">Enter</button>
</form>

