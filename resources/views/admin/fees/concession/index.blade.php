@extends('layouts.main')
 @section('content')
 <div class="container">
 	<div class="row mb-4">
 		<div class="col-md-12">
 			@include('admin.fees.header')
 		</div>
 	</div>
 	<div class="app-title col-md-4">
	    @if($message = Session::get('success'))   
	      <div class="alert alert-success">
	       {{ $message }}
	      </div>
	    @endif
  	</div>
 	<div class="row mb-4">
 		<div class="col-md-12">
 			<div class="card">
 				<div class="card-header">
 					<h5 class="card-title">Fees Concession
 						<a href="{{route('concession.apply')}}" class="btn btn-sm btn-success pull-right ">Apply Concession</a><a href="{{route('concession.create')}}" class="btn btn-sm btn-success pull-right ">Add Concession</a>
 					</h5>
 				</div>
 				<div class="card-body">
 					<table class="table table-striped table-bordered mytable">
						<thead>
							<tr>
								<th>#</th>
								<th>Category</th>
								<th>Description</th>
								<th>Discount</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1; ?>
							@foreach($concession as $concessions)
							<tr>
								<td>{{$count++}}</td>
								<td>{{$concessions->name}}</td>
								<td>{{$concessions->conses_desc}}</td>
								<td>{{(int)$concessions->consession_amnt}} - {{$concessions->discount !=null ? Arr::get(ConcessionDiscount,$concessions->discount) : ''}}</td>
								<td><a href="{{route('concession.show', $concessions->concession_id)}}" ><i class="  fa fa-eye text-green" style="font-size: 16px;"></i></a></span></td>
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