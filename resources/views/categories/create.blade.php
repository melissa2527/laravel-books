<form action="{{action('CategoryController@store')}}" method="POST">
    @csrf
    <input type="text" name="name" id="">
    <input type="submit" value="submit">
</form>