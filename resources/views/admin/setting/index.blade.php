@extends('admin.layouts.master')
@section('title'){{trans('admin.setting')}}
@endsection 
@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{trans('admin.settings')}}</h3>
              </div>
              {!!
                  Form::open([
                    'url'    => route('setting.update'),
                    'method' => 'POST',
                    'role'   => 'form'    
                ])
              !!}
              <div class="box-body">
              @foreach($setting as $set)
              <div class="form-group">
              <label for="{{$set->name}}">{{$set->title}}</label>
                @if($set->type=='text')
                    {!! form::text($set->name,$set->value,[
                        'class'       => 'form-control',
                        'placeholder' => $set->title                       
                        ]) !!}
                @elseif($set->type=='textarea')        
                {!! form::textarea($set->name,$set->value,[
                        'class'       => 'form-control',
                        'placeholder' => $set->title
                        
                        ]) !!}
                @else
                {!! form::select('',array ($set->name,$set->options,$set->value),[
                        'class'       => 'form-control',
                        ]) !!} 
                               
                @endif
                </div>
              @endforeach
              
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary">{{trans('admin.submit')}}</button>
                </div>
                </div>
              {!!
                  form::close()
              !!}
              
            </div>
            <!-- /.card -->

            
</div>      
@endsection