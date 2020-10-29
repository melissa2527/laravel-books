<h1>Subcategory: {{$subcategory->name}}</h1>

@if ($subcategory->category)
<h3>Related to Category: {{$subcategory->category->name}}</h3>
@endif

<h3>Changes</h3>
<button><a href="{{action('SubcategoryController@edit', [$subcategory->id])}}">Update</a></button>
<form method="post" action="{{action('SubcategoryController@destroy', [$subcategory->id])}}">
    @method('DELETE')
    @csrf
    <button type="submit">DELETE</button>
</form>
