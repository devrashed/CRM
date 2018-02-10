@extends('admin.layouts.master')
@section('content')
@if(Session::has('success'))
	<div class="alert alert-success">
	    <strong>Success:</strong>{{Session::get('success')}}
	</div>
@endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Developers Informations
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($developers as $developer)
                                    <tr class="odd gradeX">
                                        <td>{{$developer->name}}</td>
                                        <td>{{$developer->email}}</td>
                                        @if($developer->usertype==1)
                                        <td>{{'Developer'}}</td>
                                        @elseif($developer->usertype==2)
                                        <td>{{'Marketing'}}</td>
                                        @elseif($developer->usertype==3)
                                        <td>{{'Client'}}</td>
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