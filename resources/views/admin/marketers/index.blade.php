@extends('admin.layouts.master')
@section('content')
@if(Session::has('success'))
	<div class="alert alert-success">
	    <strong>Success:</strong>{{Session::get('success')}}
	</div>
@endif
 <div class="row">
    <div class="col-lg-12">
{{--     {{dd($marketers)}} --}}
        <div class="panel panel-default">
            <div class="panel-heading">
                Developers Informations
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
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($marketers as $marketer)
                    	@php $mar_info= json_decode($marketer['infos'],true);  @endphp
                        <tr class="odd gradeX">
                            <td>{{($mar_info['fullname'])}}</td>  
                            <td>{{$marketer->email}}</td>
                            <td>{{($mar_info['address'])}}</td>
                            <td>{{($mar_info['city'])}}</td>
                            <td>{{($mar_info['phone'])}}</td>
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