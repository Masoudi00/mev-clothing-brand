@extends('Master_Page')

@section('title', 'Orders')

@section('content')
@include('incs.flash')

<style>
    .vertical-line {
        border-left: 1px solid grey;
        height: 100%;
    }
    .bg-black {
        background-color: #000000;
    }
</style>

<div class="container justify-content-center text-white">
    <div class="table col-12 border border-secondary rounded p-2">
        <h3 class="text-danger">Orders:</h3>
        <hr>
        @if ($orders->isEmpty())
            <p class="text-center text-white">No Orders Yet.</p>
        @else
            @foreach ($orders as $order)
                <div class="row">
                    <div class="order col-6">
                        <h5 class="bg-black text-success">Customer Info:</h5>
                        <p class="bg-black text-white">Id: {{ $order->id }}</p>
                        <p class="bg-black text-white">Name: {{ $order->name }}</p>
                        <p class="bg-black text-white">Email: {{ $order->email }}</p>
                        <p class="bg-black text-white">Phone: {{ $order->phone }}</p>
                        <p class="bg-black text-white">Address: {{ $order->address }}</p>
                        <p class="bg-black text-white">ZipCode: {{ $order->zipcode }}</p>
                    </div>
                    <div class="order-details col-6 vertical-line">
                        <h5 class="bg-black text-warning">-Item Ordered:</h5>
                        @foreach ($order->orderDetails as $orderDetail)
                            @if($orderDetail->product)
                                <p class="bg-black text-white">Name: {{ $orderDetail->product->name }}</p>
                            @else
                                <p class="bg-black text-white">Name: Product not found</p>
                            @endif
                            <p class="bg-black text-white">Price: {{ $orderDetail->price }}</p>
                            <p class="bg-black text-white">Quantity: {{ $orderDetail->quantity }}</p>
                            <p class="bg-black text-white">Size: {{ $orderDetail->size }}</p>
                            <p class="bg-black text-white">
                                <img src="{{ asset('imgs/' . $orderDetail->image) }}" alt="Product Image" width="100">
                                @if($orderDetail->image2)
                                    <img src="{{ asset('imgs/' . $orderDetail->image2) }}" alt="Product Image 2" width="100">
                                @endif
                            </p>
                        @endforeach
                    </div>
                </div>
                <hr> <!-- Horizontal line to separate different orders -->

                <div class="text-center">
                    <p class="bg-black text-white text-center">Total: {{ $order->total }} </p>
                    <button class="btn btn-danger cancel-order" data-order-id="{{ $order->id }}">Cancel Order</button>
                    <a href="{{ route('orders.pdf', $order->id) }}" class="btn btn-success">Confirm Order</a>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="d-flex justify-content-center pt-5">
    <div>
        <!-- Pagination -->
        {{ $orders->links('vendor.pagination.custom') }}
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.cancel-order').forEach(button => {
            button.addEventListener('click', function () {
                const orderId = this.getAttribute('data-order-id');

                if (confirm('Are you sure you want to cancel this order?')) {
                    fetch(`/orders/${orderId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            alert('Error cancelling order. Please try again.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            });
        });
    });
</script>
@endsection

@endsection
