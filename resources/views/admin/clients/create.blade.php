@extends('admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-8">
	    {!! Form::open(['url' => '/clients','method'=>'POST']) !!}
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
                <label for="">State&ZipCode</label>
                <div class="form-group{{ $errors->has('infos[state]') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="State&ZipCode" name="infos[state]" type="text" autofocus>
                     @if ($errors->has('infos[state]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('infos[state]') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Phone Number 1</label>
                <div class="form-group{{ $errors->has('infos[phone1]') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="Phone Number 1" name="infos[phone1]" type="number" autofocus>
                     @if ($errors->has('infos[phone1]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('infos[phone1]') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Phone Number 2</label>
                <div class="form-group{{ $errors->has('infos[phone2]') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="Phone Number 2" name="infos[phone2]" type="number" autofocus>
                     @if ($errors->has('infos[phone2]'))
                        <span class="help-block">
                            <strong>{{ $errors->first('infos[phone2]') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Company Name</label>
                <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="Company Name" name="company_name" type="text" autofocus>
                     @if ($errors->has('company_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('company_name') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Bussiness Type</label>
                <div class="form-group{{ $errors->has('business_type') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="Bussiness Type" name="business_type" type="text" autofocus>
                     @if ($errors->has('business_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('business_type') }}</strong>
                        </span>
                    @endif
                </div>
                 <label for="">Project Name</label>
                <div class="form-group{{ $errors->has('project_name') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="Project Name" name="project_name" type="text" autofocus>
                     @if ($errors->has('project_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('project_name') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Client Status</label>
                <div class="form-group{{ $errors->has('client_status') ? ' has-error' : '' }}">
	                {{ Form::select('client_status', ['1' => 'Upcoming','2' => 'Ongoing','3' => 'Cencel','4' => 'Complete'],null
					,['class' => 'form-control']) }}
					 @if ($errors->has('client_status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('client_status') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Marketing Person</label>
                
                <div class="form-group{{ $errors->has('marketer_id') ? ' has-error' : '' }}">
                <select class="form-control" name="marketer_id"  >
                    <option default>Select Marketing Person</option>
                    @foreach($marketers as $marketer)
                	@php $mar_info= json_decode($marketer['infos'],true);  @endphp
                        <option value="{{$marketer->id}}">{{$mar_info['fullname']}}</option>
                        @if ($errors->has('marketer_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('marketer_id') }}</strong>
                        </span>
                    @endif
                    @endforeach
                </select>
	            
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