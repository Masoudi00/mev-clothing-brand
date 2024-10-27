@extends('Master_page')
@section('title','edit')

@section('content')
<h2 class="text-white text-center"> Modify Product</h2>

<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier le  product') }}</div>

                    <div class="card-body">

<form action="/product/{{$product->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="title">Product Name</label>
      @error('name')
          {{ $message }}
      @enderror
       <input type="text" class="form-control"  id="title" name="name" value="{{ $product->name }}">
    </div>
    <div class="form-group">
      <label for="content">Product Price</label>
      @error('price')
          {{ $message }}
      @enderror
      <input type="text" class="form-control"  id="title" name="price" value={{ $product->price }}>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">{{ __('Product Front Image') }}</label>
        <input  class="form-control" type="file" id="image" name="image">
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">{{ __('Product Back Image') }}</label>
        <input  class="form-control" type="file" id="image2" name="image2">
      </div>
    
      <div class="form-group">
        <label for="content">Product Category</label>
        @error('category')
            {{ $message }}
        @enderror
        <input type="text" class="form-control"  id="title" name="category" value={{ $product->category }}>
      </div>

    <button type="submit" class="btn btn-primary">Modify</button>
  </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

