@extends('admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-8">
    {{-- {{dd($clients)}} --}}
	    {!! Form::open(['url' => '/discussions','method'=>'POST','files' => true]) !!}
            
            <label for="">Select Service</label>
             <div class="form-group{{ $errors->has('service_id') ? ' has-error' : '' }}">
                <select class="form-control" name="service_id"  >
                    <option default>Select Service</option>
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service['service_name']}}</option>
                        @if ($errors->has('service_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('service_id') }}</strong>
                        </span>
                        @endif
                    @endforeach
                </select>
            </div>
            <label for="">Select Client</label>
             <div class="form-group{{ $errors->has('client_id') ? ' has-error' : '' }}">
                <select class="form-control" name="client_id"  >
                    <option default>Select Client</option>
                    @foreach($clients as $client)
                    @php $client_info= json_decode($client->infos,true);  @endphp
                        <option value="{{$client->id}}">{{$client_info['fullname']}}</option>
                        @if ($errors->has('client_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('client_id') }}</strong>
                        </span>
                        @endif
                    @endforeach
                </select>
            </div>
             <label for="">Project Requirement</label>
                <div class="form-group{{ $errors->has('project_req') ? ' has-error' : '' }}">

                    <textarea class="form-control" placeholder="" name="project_req" type="text" autofocus></textarea>
                     @if ($errors->has('project_req'))
                        <span class="help-block">
                            <strong>{{ $errors->first('project_req') }}</strong>
                        </span>
                    @endif
                </div>

                <label for="">Project Proposal</label>
                <div class="form-group{{ $errors->has('project_prosal') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="" name="project_prosal" type="file" autofocus>
                     @if ($errors->has('project_prosal'))
                        <span class="help-block">
                            <strong>{{ $errors->first('project_prosal') }}</strong>
                        </span>
                    @endif
                </div>

             <label for="">Proposal Send? </label>
                <div class="form-group{{ $errors->has('proposal_send') ? ' has-error' : '' }}">
                    {{ Form::select('proposal_send', ['1' => 'Yes','2' => 'No'],null
                    ,['class' => 'form-control']) }}
                     @if ($errors->has('proposal_send'))
                        <span class="help-block">
                            <strong>{{ $errors->first('proposal_send') }}</strong>
                        </span>
                    @endif
                </div>
                <label for="">Next Flowup Date</label>
                <div class="form-group{{ $errors->has('flow_date') ? ' has-error' : '' }}">

                    <input class="form-control" placeholder="" name="flow_date" type="date" autofocus>
                     @if ($errors->has('flow_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('flow_date') }}</strong>
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
	                {{ Form::select('project_status', ['1' => 'Upcoming','2' => 'Done','3' => 'Cencel'],null
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