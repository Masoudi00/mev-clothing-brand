@extends('Master_page')
@section('title','Product')

@section('content')
@include('incs.flash')
<link rel="stylesheet" href="{{ asset('css/Shop.css') }}">

<h2 class="text-center text-white"> {{ $category }}</h2>


<div class="row justify-content-center mt-5">
  @foreach ($products as $item)
  <div class="col-md-4 mb-4 ">
      <div class="card p-4" style="width: 100%;">
          <div id="carousel{{ $item['id'] }}" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('imgs/'.$item['image']) }}" class="d-block w-100" alt="First slide" height="auto" >
              </div>
              <div class="carousel-item">
                <img src="{{ asset('imgs/'.$item['image2']) }}" class="d-block w-100" alt="Second slide" height="auto">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $item['id'] }}" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $item['id'] }}" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <div class="card-body d-flex flex-column">
              <p class="invisible">{{ $item['id'] }}</p>
              <h5 class="card-title text-white">{{ $item['name'] }}</h5>
              <p class="card-text text-white">{{ $item['price'] }}DH</p>
              <a href="{{ url('product/details', ['id' => $item['id']]) }}" class="btn btn-outline-success text-white flex-shrink-0">View Product</a>
            </div>
      </div>
  </div>
  @endforeach
</div>

@endsection
