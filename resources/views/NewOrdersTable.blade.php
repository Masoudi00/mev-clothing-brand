    @extends('Master_Page')

    @section('title', 'Orders')

    @section('content')
    @include('incs.flash')


    <div class="container justify-content-center text-white">
    <div class="table col-12 border border-secondary rounded p-2">

        <h3 class="text-danger">Orders:</h3>
        @foreach ($orders as $order)
        @foreach ($order->orderDetails as $orderDetail)
<hr>
    <div class="row ">
        <div class="order col-6">
            <h5 class="bg-black text-success">Customer Info:</h5>
            @if ($loop->first)
            <p class="bg-black text-white">Id: {{ $order->id }}</p>
            <p class="bg-black text-white">Name: {{ $order->name }}</p>
            <p class="bg-black text-white">Email: {{ $order->email }} </p>
            <p class="bg-black text-white">Phone: {{ $order->phone }} </p>
            <p class="bg-black text-white">Adress:  {{ $order->address }}</p>
            <p class="bg-black text-white">ZipCode: {{ $order->zipcode }}</p>
            <p class="bg-black text-white">Total: {{ $order->total }} </p>
            @else
            <p class="bg-black text-white"></p>
            <p class="bg-black text-white"></p>
            <p class="bg-black text-white"> </p>
            <p class="bg-black text-white"> </p>
            <p class="bg-black text-white"></p>
            <p class="bg-black text-white"></p>
            <p class="bg-black text-white"> </p>
            @endif

        </div>
        <div class="order-details col-6">
            <h5 class="bg-black text-warning">Order-Details:</h5>
            <p class="bg-black text-white">Id: {{ $orderDetail->name }}</p>
            <p class="bg-black text-white">Name: {{ $orderDetail->price }}</p>
            <p class="bg-black text-white">Price: {{ $orderDetail->quantity }}</p>
            <p class="bg-black text-white">Price: {{ $orderDetail->size }}</p>
            <p class="bg-black text-white">
            <img src="{{ asset('imgs/' . $orderDetail->image) }}" alt="Product Image" width="100">
            <img src="{{ asset('imgs/' . $orderDetail->image2) }}" alt="Product Image 2" width="100">
            </p>


        </div>
    </div>
    @endforeach
    @endforeach


    </div>
    </div>



    <div class="d-flex justify-content-center pt-5">
        <div>
        <!-- Pagination -->
        {{ $orders->links('vendor\pagination\custom') }}
        </div>
    </div>



    @endsection