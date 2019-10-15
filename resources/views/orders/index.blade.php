@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Orders</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('orders.create') }}"> Create New Order</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>ID</th>
   <th>price</th>
   <th>Created_at</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $order)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $order->total_price }}</td>
    <td>{{ $order->created_at }}</td>

    <td>
       <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ route('orders.edit',$order->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection