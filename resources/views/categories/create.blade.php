<h1>Create new Category</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{action('CategoryController@store')}}" method="POST">
    @csrf
    <input type="text" name="name" id="" placeholder="name">
    <input type="submit" value="submit">
</form>