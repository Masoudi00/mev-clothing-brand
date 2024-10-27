@extends('Master_Page')

@section('title', 'Cart')

@section('content')
@include('incs.flash')

<style>
    .checkoutform {
        height: 750px;
    }
 
</style>

<div class="container  text-white test">
    @php $total = 0 @endphp
    @if(session('cart'))
        <div class="row">
            <div class="col-md-12 col-lg-6 mb-4">
                <ul class="list-group ">
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <li class="d-flex align-items-center mb-3">
                            <div id="imageCarousel{{ $id }}" class="carousel slide" data-bs-ride="carousel" style="width: 200px; height: auto;">
                                <div class="carousel-inner border border-secondary rounded mt-2">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('imgs/' . $details['image']) }}" alt="First Image" class="d-block w-100" style="width: 200px; height: auto;">
                                    </div>
                                    @if(isset($details['image2']))
                                        <div class="carousel-item">
                                            <img src="{{ asset('imgs/' . $details['image2']) }}" alt="Second Image" class="d-block w-100"  style="width: 200px; height: auto;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <span class="ms-5 mt-3">
                                <h2 class="text-white">{{ $details['name'] }} - {{ $details['size'] }}</h2>
                                <p class="text-white">MAD {{ $details['price'] * $details['quantity'] }} <small class="text-secondary"> - Price * Quantity</small></p>
                                <div class="d-flex mb-4" style="max-width: 300px">
                                    <button class="btn btn-outline-secondary px-3 me-2 decrement-quantity" data-id="{{ $id }}">-</button>
                                    <div class="form-outline">
                                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" data-id="{{ $id }}" />
                                    </div>
                                    <button class="btn btn-outline-secondary px-3 ms-2 increment-quantity" data-id="{{ $id }}">+</button>
                                </div>
                                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i> Remove</button>
                            </span>
                        </li>
                    @endforeach
                    <div class="mt-3">
                        <p class="text-secondary">Total: {{ $total }} DH</p>
                    </div>
                </ul>
            </div>
            <div class="col-md-12 col-lg-6 checkoutform border border-secondary rounded">
                <form id="buyerInfoForm" method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="m-5">
                        <label for="name" class="text-white mb-2">Full Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                    <div class="m-5">
                        <label for="phone" class="text-white mb-2">Contact Number:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Contact Number">
                    </div>
                    <div class="m-5">
                        <label for="email" class="text-white mb-2">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
                    </div>
                    <div class="m-5">
                        <label for="Address" class="text-white mb-2">Delivery Address:</label>
                        <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Delivery Address">
                    </div>
                    <div class="m-5">
                        <label for="zipcode" class="text-white mb-2">Zip Code:</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter Zip Code">
                    </div>
                    <div class="text-center mb-4">
                        <button type="submit" class="btn btn-success">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 8000 // 8 seconds
        });

        function updateCart(inputField) {
            var newQuantity = inputField.val();
            var productId = inputField.data('id');

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                    quantity: newQuantity
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

        $('.quantity').change(function() {
            updateCart($(this));
        });

        $('.decrement-quantity').click(function() {
            var inputField = $(this).closest('.d-flex').find('.quantity');
            var currentValue = parseInt(inputField.val());
            if (currentValue > 1) {
                inputField.val(currentValue - 1);
                updateCart(inputField);
            }
        });

        $('.increment-quantity').click(function() {
            var inputField = $(this).closest('.d-flex').find('.quantity');
            var currentValue = parseInt(inputField.val());
            inputField.val(currentValue + 1);
            updateCart(inputField);
        });

        $('.remove-from-cart').click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure you want to remove this item?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.data('id')
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection

@endsection
