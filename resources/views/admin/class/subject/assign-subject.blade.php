 @extends('layouts.main')
 @section('content')

<div class="container">
<div class="col-lg-12">
{{-- @include('layouts.comman') --}}
@include('admin.class.header')

 
<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title"> Assign Subject </h4>
				<div class="app-title full-right">
	               @if($message = Session::get('success'))
	                      
	                <div class="alert alert-success">
	                  {{ $message }}
	                </div>
	                @endif
              </div>
			</div>
        </div>
        <div class="card-body">
         	<div class="col-md-12">
		<div class="panel panel-default">
			<form action="{{route('subject_assign_add')}}" method="post">
				@csrf
			<div class="panel-body">				
				<div class="row">
				  <div class="col-md-3 col-xs-6 col-sm-6 error-div">
						<label>Class</label><span class="text-danger">*</span>
						<select class="form-control" name="std_class_id" id="std_class_id"> 
							<option value="">Select Class</option>

							@foreach($classes as $key=>$class)
								<option value="{{$class->id}}">{{$class->class_name}}</option>
							@endforeach
						</select>
						@error('std_class_id')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>								
					<div class="col-md-3">
						<label>Batch</label>
						<span class="text-danger">*</span>
						<select class="form-control" name="batch_id" id="batch_id">
							<option value="">Select Batch</option>
							@foreach($batches as $key=>$batch)
								<option value="{{$batch->id}}">{{$batch->batch_name}}</option>
							@endforeach
							 
						</select>
						@error('batch_id')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					<div class="col-md-3">
						<label>Section</label>
						<span class="text-danger">*</span>
						<select class="form-control" name="section_id" id="section_id"><span class="text-danger">*</span> 
							<option value="">Select Section</option>
							@foreach($sections as $key=>$section)
								<option value="{{$section->id}}">{{$section->section_name}}</option>
							@endforeach
						</select>
						@error('section_id')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-md-3">
						
						<a href="{{ URL::previous() }}" class="btn btn-sm btn-success pull-right">Back</a>
					</div>

				</div>
				<br>
				<div class="row">
					 <div class="col-md-6">
						<label>Mandatory Subjects </label>
						<span class="text-danger">*</span>
						  <select name="mendatory_subject_id[]" class="form-control select2" multiple="multiple" >
							@foreach($subject as $subjects)
								<option value="{{$subjects->id}}">{{$subjects->subject_name}}</option>
							@endforeach
						</select>
						@error('mendatory_subject_id')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-md-6">
                        <label>Optional Subjects </label>
						  <select name="optional_subject_id[]" class="form-control select2" multiple="multiple" >
							@foreach($subject as $subjects)
								<option value="{{$subjects->id}}">{{$subjects->subject_name}}</option>
							@endforeach
						</select>
						@error('optional_subject_id')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
              </div>
			</div>
			<div class="row mt-2">
				<input type="submit" value="Submit" class="btn btn-sm btn-primary">
				
			</div>
			</form>
			</div>
		</div>
  		</div>
      </div>
  </div>
</div>
</div>

 @endsection
