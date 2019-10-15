@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Order</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Order_id:</strong>
            {{ $order->id }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>User:</strong>
            {{ $order->user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            {{ $order->address }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Price:</strong>
            {{ $order->total_price }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Currency:</strong>
            {{ $order->currency }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Created_at:</strong>
            {{ $order->created_at }}
        </div>
    </div>    
    @foreach($order->orderDetails as $item)
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Order-details:</strong><br>
            <strong>Product Name:</strong>
            {{ $item->product }} <br> 
            <strong>Product Price:</strong> 
            {{ $item->price }}<br>
            <strong>Quantity:</strong>
            {{ $item->qty }}
        </div>
    </div>   
    @endforeach
</div>
@endsection