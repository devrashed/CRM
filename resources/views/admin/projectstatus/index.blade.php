@extends('admin.layouts.master')
@section('content')
@if(Session::has('success'))
	<div class="alert alert-success">
	    <strong>Success:</strong>{{Session::get('success')}}
	</div>
@endif
 <div class="row">
    <div class="col-lg-12">
{{-- {{dd($project_statuses)}} --}}

        <div class="panel panel-default">
            <div class="panel-heading">
                Project Status Informations
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Developer Name</th>
                            <th>Project Post</th>
                            <th>File Send</th>
                            <th>Comment</th>
                            <th>Project Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($project_statuses as $project_status)
                       
                        {{-- {{$current_date}} --}}
                        <tr class="odd gradeX">
                            <td>{{$project_status->service_name}}</td>
                            <td>{{$project_status->name}}</td>
                            <td>{{$project_status->project_post}}</td>
                            <td>{{$project_status->file_send}}</td>
                            <td>{{$project_status->comment}}</td>
                            @if($project_status->project_status==1)
                            <td>{{'Complete'}}</td>
                            @elseif($project_status->project_status==2)
                            <td>{{'Not Done'}}</td>
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