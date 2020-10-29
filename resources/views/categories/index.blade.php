<h1>Categories Management</h1>

@foreach($categories as $category)
<p>
    <a href="{{action('CategoryController@show', $category->id)}}">
    <strong>{{$category->name}}</strong>
    </a>
</p>
    <a href="{{action('CategoryController@edit', [$category->id])}}">Update</a>
    <form method="post" action="{{action('CategoryController@destroy', [$category->id])}}">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete">
    </form>
@endforeach