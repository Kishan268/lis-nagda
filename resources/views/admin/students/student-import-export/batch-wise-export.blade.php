 @extends('layouts.main')
 @section('content')

@include('admin.students.header')

<div class="container">
	@if($message = Session::get('success'))   
	  <div class="alert alert-success">{{ $message }}</div>
	 @endif
	 	@if($message = Session::get('error'))   
	  <div class="alert alert-danger">{{ $message }}</div>
	 @endif
	<h4 class="panel-title">Export Student Batch Wise</h4>
       <div class="col-md-12">
			<form method="post" action="{{route('batch_wise_export')}}">
			@csrf
			<div class="row">
				<div class="col-md-3">
					<select class="form-control" name="std_class_id" id="std_class_id">
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
					<select class="form-control" name="batch_id" id="batch_id">
						 
					</select>
					@error('batch_id')
						<span class="text-danger">
							<strong>{{$message}}</strong>
						</span>
					@enderror
				</div>
				<div class="col-md-3">
					<select class="form-control" name="section_id" id="section_id"> 
						
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
		<div class="all_student_import">
		{{-- <form action="{{route('import_student')}}" method="post" enctype="multipart/form-data">
		@csrf	 --}}				
		<div class="row">
			<div class="col-md-8" style="margin-top: 10px;">
			{{-- <h4><b>Import all Student</b></h4>
			<br>
			<label>Upload File</label>
			<input type="file" name="file"><br>
			<input type="submit" value="Submit" class="btn btn-sm btn-primary">
			<br>
		</form> --}}

			<div class="mt-4" style="
			color: #e74c3c;
			background-color: #ffd1cc;
			border-color: #ffb8b0; padding: 20px">
			<h5>Before upload read terms &amp; conditions:</h5>
			<ol>

				<li>Don't change sample file header.</li> 
				<li>Some field value format fixed. Date format is already fixed don't change</li>
				<li>Date of birth define should not equal to current year.</li> 
				<li>Email Must be unique</li>
				<li>Mandatory fields: 
					<ul>
						{{-- <li>Qualification name</li> --}}
						<li>Class name</li>
						<li>Year of admission</li>
						<li>Admission Batch</li>
						{{-- <li>Semester</li> --}}
						<li>Admission date</li>
						<li>Student Status</li>
						<li>First Name</li>
						<li>Last Name</li>
						<li>Mobile Number</li>
						<li>Date of Birth</li>
						<li>Gender</li>
						<li>Cast Category</li>
					</ul>
				</li>
			</ol>
			Classes Name:<ul>
				@foreach($classes as $classe)
				<li>{{$classe->class_name}}</li>
				@endforeach
				</ul>
				Gender:
				<ul>
					@foreach(GENDER as $classe)
					<li>{{$classe}}</li>
					@endforeach
					
				</ul>
				Batch name format:
				<ul>
					@foreach($batches as $batch)
					<li>{{$batch->batch_name}}</li>
					@endforeach									
				</ul>
		</div>
	</div>	
		<div class="col-md-4 col-md-offset-2">
       		<a href="{{route('download_student_sample')}}" class="mt-2">
	          <div class="card border-left-success ">
	               <span class="info-box-icon bg-green"><i class="fa fa-download">DOWNLOAD SAMPLE</i></span>
	            
	            <div class="card-body">
	              	<div class="row no-gutters align-items-center">
	                <div class="col mr-2">
	                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
	                  	 <i class="fa fa-download fa-tachometer-alt fa-2x text-gray-300"></i>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	         </a>
         <div class="mt-2">
			<a href="{{route('export_all_student')}}">
          <div class="card border-left-info ">
               <span class="info-box-icon bg-purple text-success"><i class="fa fa-download"> 
            	<strong>Export All Student</strong>
        		</i></span>
	            <div class="card-body">
	              	<div class="row no-gutters align-items-center">
	                <i class="fa fa-download fa-tachometer-alt fa-2x text-gray-300"></i>
	              </div>
	            </div>
          </div>
        </a>
	    </div>
        <div class="mt-2">
        	<a href="{{route('student_import_export')}}" >
	          <div class="card border-left-danger ">
	               <span class="info-box-icon bg-purple"><i class="fa fa-download text-info"> <strong>Inport Student Batch Section and Class wise</strong></i></span>
	            <div class="card-body mt-2">
	              	<div class="row no-gutters align-items-center">
	              		 <i class="fa fa-download fa-tachometer-alt fa-2x text-gray-300"></i>
	              </div>
	            </div>
	          </div>
         	</a>
        </div>
	</div>		    
		
</div>
@include('layouts.common')

@endsection
