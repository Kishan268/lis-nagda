 @extends('layouts.main')
 @section('content')

<div class="container">
<div class="col-lg-12">
{{-- @include('layouts.comman') --}}
@include('admin.students.header')


<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">

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
				<form action="https://adlaw.in/import_student" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="qeJUpkRYs0zvzLr09KOYjcurmpk4SlpCEM8mwygE">					<div class="row">
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
										<li>Qualification name</li>
										<li>Courses name</li>
										<li>Year of admission</li>
										<li>Admission Batch</li>
										<li>Semester</li>
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
								Quaification Name: 
								</p><ul>
									<li>Post Graduate -(PG)</li>
									<li>Under Graduate -(UG)</li>
									<li>Diploma -(Diplo) </li>
								</ul>
								Course Name:
								<ul>
									<li>LLM-Criminal Law, LLM-Civil Law, L</li>
									<li>B.A. LL.B, BBA LL.B, B.Sc LL.B</li>
								</ul>
								Gender:
								<ul>
									<li>Male -m</li>
									<li>Female -f</li>
									<li>Other -t</li>
								</ul>
								Batch name format:
								<ul>
									<li>2019-2020, 2018-2019</li>									
								</ul>
								Student status : <span>When you define student status 'Pass' so mention 'passing date' other wise don't fill 'passing date'</span>
								<ul>
									<li>Running - R</li>
									<li>Pass - P</li>
									<li>Fail - F</li>
								</ul> 
							<p></p>
							</div>
						</div>	
						<div class="col-md-4 col-md-offset-2">
            
                            <a href="upload/sample/students_sample_new_ak.csv" class="widget widget-hover-effect2 themed-background-muted-light" target="_blank">
                    <div class="widget-simple">
                        <div class="widget-icon pull-right themed-background-danger">
                            <i class="gi gi-download_alt"></i>
                        </div>
                        <h4 class="text-left text-danger">
                            <strong>Download Sample</strong>
                        </h4>
                    </div>
                </a>

                   <a href="index.php?plugin=Student&amp;action=selectBatch" class="widget widget-hover-effect2 themed-background-muted-light">
                    <div class="widget-simple">
                        <div class="widget-icon pull-right themed-background">
                            <i class="gi gi-download_alt"></i>
                        </div>
                        <h4 class="text-left">
                            <strong>Export Student Batch And Section wise</strong>
                        </h4>
                    </div>
                    </a>
                    
                                 
                   <a href="index.php?plugin=Student&amp;action=downloadAllStudent" class="widget widget-hover-effect2 themed-background-muted-light">
                    <div class="widget-simple">
                        <div class="widget-icon pull-right themed-background-success">
                            <i class="gi gi-download_alt"></i>
                        </div>
                        <h4 class="text-left text-success">
                            <strong>Export All Student</strong>
                        </h4>
                    </div>
                    </a>

                     <a href="index.php?plugin=Student&amp;action=selectEditBatch" class="widget widget-hover-effect2 themed-background-muted-light">
                    <div class="widget-simple">
                        <div class="widget-icon pull-right themed-background-danger">
                            <i class="gi gi-download_alt"></i>
                        </div>
                        <h4 class="text-left text-danger">
                            <strong>Edit Student Detail Batchwise</strong>
                        </h4>
                    </div>
                    </a>

                     <a href="index.php?plugin=Student&amp;action=selectEditSection" class="widget widget-hover-effect2 themed-background-muted-light">
                    <div class="widget-simple">
                        <div class="widget-icon pull-right themed-background-danger">
                            <i class="gi gi-download_alt"></i>
                        </div>
                        <h4 class="text-left text-danger">
                            <strong>Edit Student Detail Sectionwise</strong>
                        </h4>
                    </div>
                    </a>


                                        


                
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
