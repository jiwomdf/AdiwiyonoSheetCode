@extends('layouts.master')
@section('content')
<script>

    $.getJSON('https://learnwebcode.github.io/json-example/animals-1.json',function(data)
    {
        console.log(data);
        $.each(data, function(i, data){
            $('#content').append('<div class="col-md-4"><div class="col-mb-3"><img class="card-img-top"src="https://cdn.shopify.com/s/files/1/1842/7677/products/5-Grid-3-Color-Nail-Art-Brush-Tool-Storage-Holder-Slim-Carving-Painting-Pen-Brushes-Carrying_29d0bbba-3044-432e-a4c8-18273eb659c4_800x.jpg?v=1503069928"><div class="card-body"><h5 class="card-title">' + data.name + '</h5><p class="card-text"> I like to eat ' + data.foods.likes[0] + ' and ' + data.foods.likes[1] + '</p><a href="#"class="btn btn-primary">Go somewhere</a></div></div>')
        });
    });

</script>
<div class="content">
    <h1>Belajar Java Script</h1>
    <p>Halaman ini berisikan Javascript, menarik API public dan menampilkannya full dengan javascript</p>
    <p>Link API Public : <a href="https://learnwebcode.github.io/json-example/animals-1.json">https://learnwebcode.github.io/json-example/animals-1.json</a></p>

    <div class="row" id="content" >

    </div>

</div>


@stop