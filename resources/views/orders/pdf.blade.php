<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <h1>Order #{{ $order->id }}</h1>
    <p><strong>Name:</strong> {{ $order->name }}</p>
    <p><strong>Email:</strong> {{ $order->email }}</p>
    <p><strong>Phone:</strong> {{ $order->phone }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>ZipCode:</strong> {{ $order->zipcode }}</p>
    <p><strong>Total:</strong> {{ $order->total }}</p>

    <h2>Items:</h2>
    <ul>
        @foreach ($order->orderDetails as $detail)
            <li>
                <p><strong>Name:</strong> {{ $detail->name }}</p>
                <p><strong>Price:</strong> {{ $detail->price }}</p>
                <p><strong>Quantity:</strong> {{ $detail->quantity }}</p>
                <p><strong>Size:</strong> {{ $detail->size }}</p>
                <img src="{{ asset('imgs/' . $detail->image) }}" alt="Product Image" width="100">
                @if($detail->image2)
                    <img src="{{ asset('imgs/' . $detail->image2) }}" alt="Product Image 2" width="100">
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>
