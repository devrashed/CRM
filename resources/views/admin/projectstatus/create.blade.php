@extends('admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-8">
    {{-- {{dd($discussions)}} --}}
	    {!! Form::open(['url' => '/projectstatus','method'=>'POST','files'=>true]) !!}
            
            <label for="">Select Service</label>
             <div class="form-group{{ $errors->has('service_name') ? ' has-error' : '' }}">
                <select class="form-control" name="service_name"  >
                    <option default>Select Service</option>
                    @foreach($discussions as $discussion)
                    {{-- {{dd($discussion)}} --}}
                        <option value="{{$discussion->service_name}}">{{$discussion->service_name}}</option>
                        @if ($errors->has('service_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('service_name') }}</strong>
                        </span>
                        @endif
                    @endforeach
                </select>
            </div>
            <label for="">Select Developer</label>
             <div class="form-group{{ $errors->has('developer_id') ? ' has-error' : '' }}">
                <select class="form-control" name="developer_id"  >
                    <option default>Select Developer</option>
                    @foreach($developer as $develop)
                        <option value="{{$develop->id}}">{{$develop->name}}</option>
                        @if ($errors->has('developer_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('developer_id') }}</strong>
                        </span>
                        @endif
                    @endforeach
                </select>
            </div>
             <label for="">Project Post</label>
                <div class="form-group{{ $errors->has('project_post') ? ' has-error' : '' }}">

                    <textarea class="form-control" placeholder="" name="project_post" type="text" autofocus></textarea>
                     @if ($errors->has('project_post'))
                        <span class="help-block">
                            <strong>{{ $errors->first('project_post') }}</strong>
                        </span>
                    @endif
                </div>

                <label for="">File Upload</label>
                <div class="form-group{{ $errors->has('file_send') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="" name="file_send" type="file" autofocus>
                     @if ($errors->has('file_send'))
                        <span class="help-block">
                            <strong>{{ $errors->first('file_send') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Comment</label>
                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">

                    <textarea class="form-control" placeholder="" name="comment" type="text" autofocus></textarea>
                     @if ($errors->has('comment'))
                        <span class="help-block">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Project Status</label>
                <div class="form-group{{ $errors->has('project_status') ? ' has-error' : '' }}">
	                {{ Form::select('project_status', ['1' => 'complete','2' => 'Not Done'],null
					,['class' => 'form-control']) }}
					 @if ($errors->has('project_status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('project_status') }}</strong>
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