 @extends('layouts.main')
 @section('content')

<div class="container">
<div class="col-lg-12">
{{-- @include('layouts.comman') --}}
@include('admin.students.header')


<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">
<div class="app-title">
     @if($message = Session::get('success'))   
      <div class="alert alert-success">{{ $message }}</div>
          @endif
    </div>
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title"> Upload Student </h4>
			</div>
        </div>
        <div class="card-body">
        	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title"></h4>
			</div>
			<div class="panel-body">	
				<form action="{{route('import_student')}}" method="post" enctype="multipart/form-data">
					@csrf					<div class="row">
						<div class="col-md-8" style="margin-top: 10px;">
							<h4><b>Import Student</b></h4>
							<br>
							<label>Upload File</label>
							<input type="file" name="file">
														<br>
							<input type="submit" value="Submit" class="btn btn-sm btn-primary">
							<br>
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
										<li>Courses name</li>
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
							<p>
								Course Name:
								<ul>
									@foreach($classes as $classe)
									<li>{{$classe->class_name}}</li>
									@endforeach
								</ul>
								Gender:
								<ul>
									<li>Male</li>
									<li>Female</li>
									<li>Other</li>
								</ul>
								Batch name format:
								<ul>
									@foreach($batches as $batch)
									<li>{{$batch->batch_name}}</li>
									@endforeach									
								</ul>
								{{-- Student status : <span>When you define student status 'Pass' so mention 'passing date' other wise don't fill 'passing date'</span>
								<ul>
									<li>Running - R</li>
									<li>Pass - P</li>
									<li>Fail - F</li>
								</ul> 
 --}}							<p></p>
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
					        	<a href="{{route('export_student_class_section_batch_wise')}}" >
						          <div class="card border-left-danger ">
						               <span class="info-box-icon bg-purple"><i class="fa fa-download text-danger"> <strong>Export Student Batch And Section wise</strong></i></span>
						            <div class="card-body mt-2">
						              	<div class="row no-gutters align-items-center">
						              		 <i class="fa fa-download fa-tachometer-alt fa-2x text-gray-300"></i>
						              </div>
						            </div>
						          </div>
					         	</a>
					        </div>
					      
						   {{--  <div class="mt-2">
					         <a href="{{route('export_all_student')}}">
					          <div class="card border-left-success ">
					               <span class="info-box-icon bg-purple text-danger"><i class="fa fa-download"> 
			                            <strong>Edit Student Detail Batchwise</strong>
			                        </i>
			                    </span>	
					            <div class="card-body">
					              	<div class="row no-gutters align-items-center">
					                <i class="fa fa-download fa-tachometer-alt fa-2x text-gray-300"></i>
					              </div>
					            </div>
					          </div>
					         </a> 
					        </div>
					        <div class="mt-2"> 
					         <a href="{{route('export_all_student')}}">
					          <div class="card border-left-success ">
					               <span class="info-box-icon bg-purple text-danger"><i class="fa fa-download">
		                            <strong>Edit Student Detail Sectionwise</strong>
		                        </i>
			                    </span>	
					            <div class="card-body">
					              	<div class="row no-gutters align-items-center">
					               <div class="col-auto">
					                  <i class="fa fa-download fa-tachometer-alt fa-2x text-gray-300"></i>
					                </div>
					              </div>
					            </div>
					          </div>
					         </a>
					     </div> --}}
           				</div>
					</div> 
				</form>
			</div>
		</div>
	</div>
		</div>
        </div>
      </div>

  </div>
</div>
</div>
<script>
	$(document).ready(function(){
		$('#qual_catg').on('change',function(e){
			e.preventDefault();
			var batch_id = $(this).val();
			qual_course(qual_catg_code);
			qual_docs(qual_catg_code);
		});
		$('#btnFilter').on('click',function(e){
			e.preventDefault();
			var batch_id = $('select[name="batch_id"] option:selected').val();
			var std_class_id = $('select[name="std_class_id"] option:selected').val();
			var section_id = $('select[name="section_id"] option:selected').val();
			var status = 'R';
			var user_id = 'user_id';

			var page = 'student_detail';
			 if(section_id !=''  && batch_id !='' && std_class_id != '' ){
				$.ajax({
					type:'POST',

					url: "{{route('student_manage_get_data')}}",
					data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,user_id:user_id,page:page,status:status, "_token": "{{ csrf_token() }}",},
					success:function(res){
						$('#tableFilter').empty().html(res);
					}
				});
			}else{
				alert('please select all field');
			}

		});
	});
</script>
 @endsection
