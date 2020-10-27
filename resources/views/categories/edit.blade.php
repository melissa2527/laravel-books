<h1>Edit a Category: {{$category->name}}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{action('CategoryController@update', [$category->id])}}" method="POST">
    @csrf
    @method('put')
<input type="text" name="name" id="" value="{{$category->name}}">
    <input type="submit" value="submit">
</form>