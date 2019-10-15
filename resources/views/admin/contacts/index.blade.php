@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Contact</h2>
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
            <th>No</th>
            <th>Name</th>
            <th>Created_at</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($data as $key => $contact)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $contact->name }}</td>
	        <td>{{ $contact->created_at }}</td>
	        <td>
                <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Show</a>

                    {!! Form::open(['method' => 'DELETE','route' => ['contacts.destroy', $contact->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>




<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection