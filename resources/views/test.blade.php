<h1>Hello <?php echo $user ?> <?php echo $surname ?> from test View</h1>

<h1>Hello {{$user}} {{$surname}}.  This is the better way with blade </h1>

@if($age >=18) 
    <p>You can buy wine here</p>
@else
    <p>Sorry you are too young</p>
@endif