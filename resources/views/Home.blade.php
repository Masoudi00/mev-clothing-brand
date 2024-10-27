@extends('Master_page')

@section('title', 'Home')
@include('incs.flash')
@section('content')
<link rel="stylesheet" href="{{ asset('css/Home.css') }}">

<div class="container-fluid Full-screen">
    <div class="row align-items-center text-center text-white">
        <div class="col-md-6">
            <img class="img-fluid" src="{{ asset('imgs/C.PNG') }}" alt="">
        </div>
        <div class="col-md-6 text-div"> 
            <h1 class="fw-bold">"Mastering Excellence And Versatility!"</h1>
            <p class="fw-bold text-secondary">Mev.</p>
        <a href="/Shop"><button class="btn btn-outline-success">Order Now!</button></a> 
        </div>
     
    </div>
</div>

@endsection