<h1>Enter a New Bookshop</h1>
<form action="{{action('BookshopController@store')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="name">
    <input type="text" name="city" placeholder="city">
    <input type="submit" value="submit" placeholder="New Book">
</form>