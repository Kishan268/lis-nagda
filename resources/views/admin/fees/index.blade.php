@extends('layouts.main')
 @section('content')
<div id="content">
@include('admin.fees.header')

<div class="container">
    <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
            <h4 class="panel-title">Fees  <a href="{{route('fees.create')}}" class="btn btn-success pull-right">Add Fees</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right">Back</a></h4>
         {{--  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          </div> --}}
          <!-- Card Body -->
          <div class="card-body">
            {{-- <div class="row"> --}}
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
            {{-- </div> --}}
    	</div>
  	</div>
</div>



 @endsection