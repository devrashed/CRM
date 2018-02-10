@extends('admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-8">
	    {!! Form::open(['url' => '/services','method'=>'POST']) !!}
	    		<label for="">Service Name</label>
	    		<div class="form-group{{ $errors->has('service_name') ? ' has-error' : '' }}">
                {{Form::text('service_name','',['class'=>'form-control','placeholder'=>'Name','autofocus'])}}
                    {{-- <input class="form-control" placeholder="E-mail" name="services_name" type="email" autofocus> --}}
                     @if ($errors->has('service_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('service_name') }}</strong>
                        </span>
                    @endif
                </div>
                
                <!-- Change this to a button or input when using this as a form -->
                 <div class="form-group">
                    <input class="btn  btn-success btn-block"  name="submit" type="submit" value="ADD">
                </div>
	        {!! Form::close() !!}
	    </div>
	</div>
</div>
@endsection
