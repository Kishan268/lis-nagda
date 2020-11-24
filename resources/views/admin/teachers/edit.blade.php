
@extends('layouts.main')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12">
			@include('admin.teachers.header')
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 ">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Edit Teacher			
						<a href="{{ Route('teachers.index') }}" class="btn btn-sm btn-primary pull-right">Back</a>
					</h4>
				</div>
				<div class="card-body">	
					<form action="{{route('teachers.update',$teacherUpdate->id)}}" method="post">
						@csrf
						@method('PUT')
						<div class="row form-group">
							<div class="col-md-6">
								<input type="hidden" class="form-control" name="id" value="{{$teacherUpdate->id}}"> 
								<label for="name">Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control timepicker" name="name" value="{{$teacherUpdate->name}}">  
								@error('name')
		                            <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                          </span>
		                         @enderror     
							</div>	
							<div class="col-md-6">
								<label for="email">Email Address <span class="text-danger">*</span></label>
								<input type="email" name="email" class="form-control" value="{{$teacherUpdate->email}}">
								@error('email')
		                            <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                          </span>
		                         @enderror 
							</div>
						</div>	
						<div class="row form-group">
							<div class="col-md-6">
								<label for="mobile_no">Mobile Number <span class="text-danger">*</span></label>
								<input type="text" class="form-control \" name="mobile_no" value="{{$teacherUpdate->mobile_no}}">   
								 @error('mobile_no')
		                            <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                          </span>
		                         @enderror     
							</div>	
							<div class="col-md-6">
								<label for="password">Password <span class="text-danger">*</span></label>
								<input type="password" class="form-control" name="password" value="{{old('password')}}">
								@error('password')
		                            <span class="text-danger" role="alert">
		                            <strong>{{ $message }}</strong>
		                          </span>
		                         @enderror
							</div>
						</div>	
											
						<div class="row ">
							<div class="col-md-12 ">
								<input type="submit" value="Submit" class="btn btn-sm btn-primary">
							</div>								
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
 @endsection
