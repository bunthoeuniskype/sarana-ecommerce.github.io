@extends('admin.layout.master_side')

@section('content')

<div class="col-xs-6 col-xs-offset-3">
 <div class="panel panel-defualt">
                        <div class="panel panel-heading clearfix" style="padding-top: 0px; margin-top: -9px;">
                          <a href="{{ url('admin/category') }}"> <button class="btn btn-primary pull-right"><i class="fa fa-reply" aria-hidden="true"></i> {{ trans('common.back') }} </button></a>
                        <h3 style="margin-top: 5px;"> {{ trans('common.edit') }} {{ trans('common.category') }} </h3>
                         </div>
                            <div class="panel panel-body">

<!--show error -->
@include('errors/errors')

 @if(Session::has('save'))
              <div class="alert alert-success">
                        <em>{!! Session('save') !!}</em>
                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times</span>
                        </button>
              </div>
  @endif


  {!! Form::open(array('url' => array('admin/category/'.$id),'method'=>'PUT')) !!}
 
 {{ csrf_field() }}


 <table style="border: 1px solid #9f9f9f;" cellspacing="10" class="table"> 

  @foreach($category as $key => $c) 
  <tr>
    <td>
          <label for="name">{{ trans('common.name') }} {{$c->language->name}}</label>
        </td>
        <td>
  {!! Form::text('name[]',$c->name,array("class"=>"form-control","id"=>"name_".$c->language_code, "required"=>"true" )) !!}
  </td>
  </tr> 

@if($key==1)
<tr>
    <td>
          <label for="order">{{ trans('common.order') }}</label>
        </td>
        <td>
  {!! Form::text('order',$c->order,array("class"=>"form-control","id"=>"order", "required"=>"true" )) !!}
  </td>
  </tr>

    <tr>
    <td>
          <label for="status">{{ trans('common.status') }}</label>
        </td>
        <td>
   <div class="input-group">
            <div id="radioBtn" class="btn-group">
              <a class="btn btn-success btn-sm {{ $c->status==1? 'active' : 'notActive' }}" data-toggle="status" data-title="1">Enable</a>
              <a class="btn btn-success btn-sm {{ $c->status==0? 'active' : 'notActive' }}" data-toggle="status" data-title="0">Disable</a>
            </div>
            <input type="hidden" name="status" value="{{ $c->status }}" id="status">
    </div>

  </td>
  </tr>

@endif

@endforeach

     <tr>
     <td style="border-top:0px;"> </td>
    <td class="pull-right" style="border-top:0px;">
    <button type="reset" class="btn btn-default"> <i class="fa fa-refresh" aria-hidden="true"></i> {{ trans('common.reset') }}</button>      
          <button type="submit" class="btn btn-primary" id="btnsave"><i class="fa fa-save fa-fw" aria-hidden="true"></i> {{ trans('common.save') }}</button>
        </td>
      </tr>
    </table>
 
 {!! Form::close() !!} 
      </div>
    </div>
   </div>

@endsection
