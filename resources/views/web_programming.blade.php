@extends('layouts.master')
@section('content')
<script src="js/ApiGetAnimal.js"></script>
<div class="content">
    <h1>Belajar Java Script</h1>
    <p>Halaman ini berisikan Javascript, menarik API public dan menampilkannya full dengan javascript</p>
    <p>Link API Public : <a href="https://learnwebcode.github.io/json-example/animals-1.json">https://learnwebcode.github.io/json-example/animals-1.json</a></p>

    {{-- div yang di target sama API ajax --}}
    <div class="row" id="content" ></div>
    

</div>


@stop