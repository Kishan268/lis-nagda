@extends('layouts.main')
 @section('content')
 <div class="container">
 	<div class="row mb-4">
 		<div class="col-md-12">
 			@include('admin.fees.header')
 		</div>
 	</div>
 	<div class="row mb-4">
 		<div class="col-md-12">
 			<div class="card">
 				<div class="card-header">
 					<h5 class="card-title">Fees
 						<a href="{{route('fees.create')}}" class="btn btn-sm btn-success pull-right">Add Fees</a>
 					</h5>
 				</div>
 				<div class="card-body">
 					<table class="table table-striped table-bordered mytable">
						<thead>
							<tr>
								
								<th>Fees Name</th>
								<th>Fees Amount</th>
								<th>Course</th>
								<th>Batch</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $datas)
							<tr>
								<td>{{$datas->fees_name}}</td>
								<td>{{$datas->fees_amt}}</td>
								<td>{{$datas->courseselection == 1 ? 'Multiple Courses' : 'Single Course'}}</td>
								<td><?php $dataarray =json_encode($datas->course_batches); ?>{{json_decode($dataarray)}}</td>
								<td><div class="btn-group">
	                                <a data-original-title="Edit" href="{{route('fees.edit',$datas->id)}}" data-toggle="tooltip" class="btn btn-xs btn-default">
	                                    <i class="fa fa-pencil"></i>
	                                </a>
	                                <a data-original-title="Delete" href="{{route('fees.destroy',$datas->id)}}" onclick="if(confirm('Are you sure you want to delete this fees')){ return true }else{ return false; }" data-toggle="tooltip" class="btn btn-xs btn-danger">
	                                    <i class="fa fa-times"></i>
	                                </a>
	                            </div></td>
							</tr>
							@endforeach
						</tbody>
				</table> 
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

@endsection