<h1>Enter a New Book</h1>
<form action="{{action('BookController@store')}}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="title">
    <input type="text" name="authors" placeholder="author(s)">
    <input type="text" name="image" value="https://focusgreece.com/wp-content/uploads/2018/09/Crete-Island-4-1.jpg" placeholder="image">
    <input type="submit" value="submit" placeholder="New Book">

</form>