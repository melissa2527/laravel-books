<h1>Categories Management</h1>

@foreach($categories as $category)
<p>
    <a href="{{action('CategoryController@show', $category->id)}}">
    {{$category->name}}
    </a>
</p>
    <a href="{{action('CategoryController@edit', [$category->id])}}">Update</a>
    <a href="{{action('CategoryController@destroy', $category->id)}}">Delete</a>
@endforeach