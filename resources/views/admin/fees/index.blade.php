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
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table> 
            {{-- </div> --}}
    	</div>
  	</div>
</div>



 @endsection