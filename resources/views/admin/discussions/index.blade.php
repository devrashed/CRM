@extends('admin.layouts.master')
@section('content')
@if(Session::has('success'))
	<div class="alert alert-success">
	    <strong>Success:</strong>{{Session::get('success')}}
	</div>
@endif
 <div class="row">
    <div class="col-lg-12">
{{-- {{dd($discussions)}} --}}

        <div class="panel panel-default">
            <div class="panel-heading">
                discussions Informations
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Client Name</th>
                            <th>Project Requirement</th>
                            <th>Project Proposal</th>
                            <th>Project Send</th>
                            <th>Current Date</th>
                            <th>Flowup Date</th>
                            <th>Comment</th>
                            <th>Project Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($discussions as $discussion)
                        @php 
                            $client_info= json_decode($discussion->clients_infos,true);
                            //print_r($client_info);die();
                            //$current_date= strtotime($discussion->current_date); echo date('F d, Y',$current_date);
                            //echo $current_date;die;
                           //$flow_date= strtotime($discussion->flow_date); echo date('F d, Y',$flow_date);
                        @endphp
                        {{-- {{$current_date}} --}}
                        <tr class="odd gradeX">
                            <td>{{$discussion->service_name}}</td>
                            <td>{{$client_info['fullname']}}</td>
                            <td>{{$discussion->project_req}}</td>
                            <td>{{$discussion->project_prosal}}</td>
                             @if($discussion->proposal_send==1)
                            <td>{{'Yes'}}</td>
                            @elseif($discussion->proposal_send==2)
                            <td>{{'No'}}</td>
                            @endif 
                            {{-- <td>{{$discussion->created_at->toFormattedDateString()}}</td> --}}
                            <td>{{Carbon\Carbon::parse($discussion->created_at)->format('d-m-Y')}}</td>
                            <td>{{Carbon\Carbon::parse($discussion->flow_date)->format('d-m-Y')}}</td>
                            <td>{{$discussion->comment}}</td>
                            @if($discussion->project_status==1)
                            <td>{{'Upcoming'}}</td>
                            @elseif($discussion->project_status==2)
                            <td>{{'Done'}}</td>
                            @elseif($discussion->project_status==3)
                            <td>{{'Cencel'}}</td>
                            @endif
                        </tr>
					@endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection