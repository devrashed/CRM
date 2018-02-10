@extends('admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-8">
	    {!! Form::open(['url' => '/developers','method'=>'POST']) !!}
	    		<label for="">Fullname</label>
	    		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {{Form::text('name','',['class'=>'form-control','placeholder'=>'Name','autofocus'])}}
                    {{-- <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus> --}}
                     @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Email</label>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{Form::email('email','',['class'=>'form-control','placeholder'=>'E-mail','autofocus'])}}
                    {{-- <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus> --}}
                     @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Password</label>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
                   {{--  <input class="form-control" placeholder="Password" name="password" type="password" value=""> --}}
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">User Type</label>
                <div class="form-group{{ $errors->has('usertype') ? ' has-error' : '' }}">
	                {{ Form::select('usertype', ['1' => 'Developer','2' => 'marketing','3' => 'Client'],null
					,['class' => 'form-control']) }}
					 @if ($errors->has('usertype'))
                        <span class="help-block">
                            <strong>{{ $errors->first('usertype') }}</strong>
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
