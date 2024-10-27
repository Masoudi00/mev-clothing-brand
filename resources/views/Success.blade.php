@extends('Master_page')

@section('title', 'success')

@include('incs.flash')

@section('content')
<div class="text-center pt-5">
    <h1 class="text-white  pt-5">"Order Submitted Successfully"</h1>
    <p class="text-secondary">You will be contacted soon via number or email.</p>
    <p class="text-success">Payment on delivery.</p>

    <button class="btn btn-outline-danger" onclick="window.location.href='/Shop'">Continue Shopping</button>
</div>
@endsection