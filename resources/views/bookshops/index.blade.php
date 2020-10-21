<h1>List of Bookshops</h1>
<button><a href="{{action('BookshopController@create')}}">Create a Bookshop</a></button>
<h2>List of Existing Bookshops</h2>
@foreach($bookshops as $bookshop)
    <h3> {{$bookshop->name}} </h3>
    <p>{{$bookshop->city}}</p>
    <img src="https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/hostedimages/1380347313i/701667.jpg">
<button><a href="{{action('BookshopController@show', $bookshop->id)}}">More Details</a></button>
  
@endforeach
