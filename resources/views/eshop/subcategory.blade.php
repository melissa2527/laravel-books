<h1>Subcategory: {{$subcategory->name}}</h1>
<a href="">Back to category {{$category->name}}</a>

@foreach($books as $b)
    <h2>{{$b->title}}</h2>
    <p>
@endforeach