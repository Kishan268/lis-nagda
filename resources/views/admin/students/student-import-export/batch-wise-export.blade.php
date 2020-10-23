 @extends('layouts.main')
 @section('content')

<div class="container">
	 <div class="col-lg-12">
{{-- @include('layouts.comman') --}}
@include('admin.students.header')


<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">
    </div>
</div>

<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title">Export Student Batch Wise</h4>
			</div>
        </div>
        <div class="card-body">
         	<div class="col-md-12">
		<div class="panel panel-default">
			<form method="post" action="{{route('batch_wise_export')}}">
				@csrf
			<div class="panel-body">				
				<div class="row">								
					<div class="col-md-3">
						<select class="form-control" name="batch_id">
							<option value="">Select Batch</option>
							@foreach($batches as $batch)
							<option value="{{$batch->id}}">{{$batch->batch_name}}</option>
						@endforeach
							 
						</select>
						@error('batch_id')
							<span class="text-danger">
								<strong>{{$message}}</strong>
							</span>
						@enderror
					</div>
					<div class="col-md-3">
						<select class="form-control" name="std_class_id"> 
							<option value="">Select Class</option>
								@foreach($classes as $class)
									<option value="{{$class->id}}">{{$class->class_name}}</option>
								@endforeach
							</select>
						@error('std_class_id')
							<span class="text-danger">
								<strong>{{$message}}</strong>
							</span>
						@enderror
					</div>
					<div class="col-md-3">
						<select class="form-control" name="section_id"> 
							<option value="">Select Section</option>
							@foreach($sections as $section)
								<option value="{{$section->id}}">{{$section->section_name}}</option>
							@endforeach
						</select>
						@error('section_id')
							<span class="text-danger">
								<strong>{{$message}}</strong>
							</span>
						@enderror
					</div>
					<div class="col-md-3">
						<input type="submit" name="submit" value="Export" class="btn btn-sm btn-primary">
						{{-- <a href="{{route('student_detail.create')}}" class="btn btn-sm btn-success pull-right">Add Export</a> --}}
					</div>

				</div>
				</form>
				<br>
				
			</div>
		</div>
	</div>
        </div>
      </div>

  </div>
</div>
</div>

 @endsection
