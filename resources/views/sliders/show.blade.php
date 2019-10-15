@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Slider</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('sliders.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $slider->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>User:</strong>
            {{ $slider->creator }}
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            
             @if($slider->image != null)
             <tr>
                <th> <strong>slider:</strong> </th>
                <td><img src="{{ $slider->photo }}" style="width:450px ; height:450px"> </td>
             </tr>
             @endif
            
        </div>
    </div>
    
</div>
@endsection