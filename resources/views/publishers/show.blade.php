<h1>{{$publisher->title}}</h1>
<ul>
 @foreach($publisher_id as $id)
<h4>{{$id->title}}</h4>
<p>{{$id->authors}}</p>
<img src="{{$id->image}}">
@endforeach
</ul>

