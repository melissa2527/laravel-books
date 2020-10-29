<h1>Subcategories</h1>

<a href="{{action('SubcategoryController@create')}}">Create a Subcategory</a>

@foreach ($subcategories as $sub)
<li>{{$sub->name}}</li>
<a href="{{action('SubcategoryController@show', $sub->id)}}">Details</a>
@endforeach