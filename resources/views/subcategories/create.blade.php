<h1>Create a Subcategory</h1>
<a href="/subcategories">Back to the Subcategories</a>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{action('SubcategoryController@store')}}">
    @csrf
    <input type="text" name="name" placeholder="New Subcategory">
    <select name="category_id">
        @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
    <input type="submit">
</form>

