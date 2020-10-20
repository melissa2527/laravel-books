<h1>Books eshop</h1>

<ul>
@foreach($categories as $category)
<li>
<a href="{{action('EshopController@index', $category->id)}}">{{$category->name}}</a>
</li>
@endforeach
</ul>
@foreach($books as $book)
    <h2> {{$book->title}} </h2>
    <p>{{$book->authors}}</p>
    <img src="{{$book->image}}"/>
    <p>
    <a href="{{action('EshopController@index', $book->id)}}">Detail</a>
    </p>


@endforeach