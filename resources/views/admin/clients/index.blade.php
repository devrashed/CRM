@extends('admin.layouts.master')
@section('content')
@if(Session::has('success'))
	<div class="alert alert-success">
	    <strong>Success:</strong>{{Session::get('success')}}
	</div>
@endif
 <div class="row">
    <div class="col-lg-12">
{{-- {{dd($clients)}} --}}

        <div class="panel panel-default">
            <div class="panel-heading">
                Clients Informations
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Marketing Person</th>
                            <th>Company Name</th>
                            <th>Where Come From</th>
                            <th>Project Name</th>
                            <th>Client Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client){{-- {{$client->marketers_infos}}{{dd($client)}} --}}

                    	@php 
                    	$client_info= json_decode($client->infos,true);
                    	//print_r($client_info);die();

                    	$mar_info= json_decode($client->marketers_infos,true);

                    	@endphp
                        <tr class="odd gradeX">
                            <td>{{($client_info['fullname'])}}</td>  
                            <td>{{$client->email}}</td>
                            <td>{{($client_info['address'])}}</td>
                            <td>{{($client_info['city'])}}</td>
                            <td>{{($client_info['phone1'])}}</td>
                            <td>{{($mar_info['fullname'])}}</td>  
                            <td>{{$client->company_name}}</td>
                            <td>{{$client->where_come}}</td>
                            <td>{{$client->project_name}}</td>
                            @if($client->client_status==1)
                            <td>{{'Upcoming'}}</td>
                            @elseif($client->client_status==2)
                            <td>{{'Ongoing'}}</td>
                            @elseif($client->client_status==3)
                            <td>{{'Cencel'}}</td>
                            @elseif($client->client_status==4)
                            <td>{{'Complete'}}</td>
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