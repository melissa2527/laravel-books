<h1>Edit a Book: {{$book->title}}</h1>
<p>{{$book->authors}}</p>
<p>{{$book->genre}}</p>

{{-- <form method="post" action="/books/{{$book->id}}">
@csrf
@method('patch')
<input type="text" name="title" value="{{$book->title}}" placeholder="title">
<input type="text" name="authors" value="{{$book->authors}}" placeholder="author">
<input type="text" name="genre" value="{{$book->genre}}" placeholder="genre">
    <input type="text" name="image" value="https://focusgreece.com/wp-content/uploads/2018/09/Crete-Island-4-1.jpg" placeholder="image">
    <button type="submit">Enter</button>
</form>

<h1>Edit a Book</h1> --}}
<form action="['action' => ['BookController@update', $book->id]," method="POST">
    @csrf
    @method('patch')
    <input type="text" name="title" placeholder="title">
    <input type="text" name="authors" placeholder="author(s)">
    <input type="text" name="image" value="" placeholder="image">
    <input type="submit" value="submit" placeholder="New Book">

</form>