<h1>Publishers</h1>

@foreach($publishers as $p)
    <h2>{{$p->title}}</h2>
<a href="{{action('PublisherController@show', $p->id)}}"><button>Details about Publisher</button></a>
@endforeach




{{-- <a href="{{action('PublisherController@index')}}"><button>More info: {{$publisher->title}}</button></a> --}}