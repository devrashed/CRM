@extends('admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-8">
	    {!! Form::open(['url' => '/marketers','method'=>'POST']) !!}
	    		<label for="">Fullname</label>
	    		<div class="form-group{{ $errors->has('infos[fullname]') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="Fullname" name="infos[fullname]" type="text" autofocus>
                     @if ($errors->has('infos[fullname]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('infos[fullname]') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Address</label>
                <div class="form-group{{ $errors->has('infos[address]') ? ' has-error' : '' }}">

                    <textarea class="form-control" placeholder="Address" name="infos[address]" type="text" autofocus></textarea>
                     @if ($errors->has('infos[address]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('infos[address]') }}</strong>
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
                <label for="">City</label>
                <div class="form-group{{ $errors->has('infos[city]') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="City" name="infos[city]" type="text" autofocus>
                     @if ($errors->has('infos[city]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('infos[city]') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Phone Number</label>
                <div class="form-group{{ $errors->has('infos[phone]') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="Phone Number" name="infos[phone]" type="number" autofocus>
                     @if ($errors->has('infos[phone]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('infos[phone]') }}</strong>
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
