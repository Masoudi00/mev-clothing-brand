@extends('Master_Page')

@section('content')

@include('incs.flash')

<link rel="stylesheet" href="{{ asset('css/ProductDetails.css') }}">

<div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('imgs/'.$product['image']) }}" class="card-img-top mb-5 mb-md-0" alt="Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('imgs/'.$product['image2']) }}" class="card-img-top mb-5 mb-md-0" alt="Image 2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <h1 class="display-5 fw-bolder text-white">{{ $product['name'] }}</h1>
            <div class="fs-5 mb-3">
                <span class="text-secondary">{{ $product['price'] }} DH</span>
            </div>
            <!-- Square buttons for selecting size -->
            <div class="size-buttons mb-3">
                <button type="button" class="size-button" value="S" >S</button>
                <button type="button" class="size-button" value="M">M</button>
                <button type="button" class="size-button" value="L">L</button>
                <button type="button" class="size-button" value="XL">XL</button>
            </div>
            <!-- You can add more details about the product here -->
            <p>{{ $product['description'] }}</p>


            <!-- Button to add to cart -->
            <input type="hidden" name="size" id="selected_size" value="S">

            <a href="{{ url('cart/add', ['id' => $product['id'], 'size' => $product['selected_size']]) }}" class="btn btn-outline-success text-center text-white add-to-cart-btn" role="button">Add to cart</a>

        </div>
    </div>
</div>

<script>
    // JavaScript to handle size selection
    const sizeButtons = document.querySelectorAll('.size-button');

    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Set the selected size in the hidden input field
            const selectedSizeInput = document.getElementById('selected_size');
            selectedSizeInput.value = this.value;

            // Highlight the selected size button
            sizeButtons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    // Add event listener to Add to Cart button to dynamically set the size value before submitting
    document.querySelector('.add-to-cart-btn').addEventListener('click', function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Get the selected size
        const selectedSize = document.getElementById('selected_size').value;

        // Construct the URL with the selected size value
        const addToCartUrl = this.href + '/' + selectedSize;

        // Redirect to the constructed URL
        window.location.href = addToCartUrl;
    });
</script>

@endsection