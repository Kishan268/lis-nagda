@extends('layouts.main')
@section('content')
<section class="content">
@include('admin.attendance.header')

 <div class="container">
 	<div class="card shadow mb-4">
	        <!-- Card Header - Dropdown -->
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	          <h6 class="m-0 font-weight-bold text-primary">Student Attendance</h6>
	          <h4 class="panel-title pull-right"> Today Date :- {{date('d-m-Y')}} | Time: {{date('h:i A')}}</h4>
	    </div>
	        <!-- Card Body -->
	<div class="card-body">
		<div class="col-md-12 m-auto">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					  <div class="col-md-3">
							<select class="form-control" name="std_class_id" id="std_class_id"> 
								<option value="">Select Class</option>
									@foreach($classes as $key=>$class)
										<option value="{{$class->id}}">{{$class->class_name}}</option>
									@endforeach
								</select>
								@error('std_class_id')
									<span class="invalid-feedback text-danger" role="alert">
									<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>								
						<div class="col-md-3">
							<select class="form-control" name="batch_id" id="batch_id">
								<option value="">Select Batch</option>
									@foreach($batches as $key=>$batch)
										<option value="{{$batch->id}}">{{$batch->batch_name}}</option>
									@endforeach
								</select>
							@error('batch_id')
								<span class="invalid-feedback text-danger" role="alert">
								<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						
						<div class="col-md-3">
							<select class="form-control" name="section_id" id="section_id"> 
								<option value="">Select Section</option>
								@foreach($sections as $key=>$section)
									<option value="{{$section->id}}">{{$section->section_name}}</option>
								@endforeach
							</select>
							@error('section_id')
								<span class="invalid-feedback text-danger" role="alert">
								<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

					<div class="col-md-2">
						<button class="btn btn-sm btn-primary search">Search</button>
					</div>
					</div>
					<div class="row mt-2">
					<div class="col-md-12" id="tableBody">
					
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-success pull-right" id="btnSubmit">Submit</button>
							</div>
						</div>
					</div>
				</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-12" id="tableBody" ></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

 </div>
</section>
<script>
	$(document).ready(function(){
		$(document).on('click','.selectAll' ,function(){	
			 console.log('select');
			 if ($(this).is( ":checked" )) {
				$('body .check').prop('checked',true);

			 }else{
				$('body .check').prop('checked',false);
			 }
		});

		$('.search').on('click',function(e){
			e.preventDefault();
			filter_students();
		});

		$(document).on('click','#btnSubmit',function(e){
			e.preventDefault();
			var present_student = [];
			var i = 0;
			$('input[name="s_id[]"]:checked').each(function() {
				present_student[i++] = $(this).val();
			});
			// console.log(present_student)
			var j =0;
			var total_student = [];
			$('input[name="s_id[]"]').each(function() {
				total_student[j++] = $(this).val();
			});
			
			// console.log(s_ids1);
			// if(present_student.length !=0){
			$.ajax({
				type:'post',
				url:'{{route('attendance.submit')}}',

				data:{present_student:present_student,total_student:total_student, "_token": "{{ csrf_token() }}"},
				success:function(res){
					// console.log(res)
					if(res == 'success'){
						$.notify("Students attendance successfully submitted",'success');
						
					}else if(res =='warning'){
						$.notify("Student attendance already submitted");
					}else{
						$.notify("You can't submit weekend day attendance");
					}
					filter_students();
				}
			});

			// }else{
			// 	alert('Select the students first')
			// }	
		});
		function filter_students(){
			// var qual_catg_code = $('select[name="qual_catg_code"] option:selected').val();
			// var qual_code = $('select[name="qual_code"] option:selected').val();
			// var batch = $('select[name="batch"] option:selected').val();
			// var year = $('select[name="year"] option:selected').val();
			// var semester = $('select[name="semester"] option:selected').val();
			// if(qual_catg_code!='' && qual_code != '' && batch != '' && year != '' && semester !=''){
			// 	$.ajax({
			// 		type:'post',
			// 		url:'',
			// 		data:{qual_code:qual_code,qual_catg_code:qual_catg_code,batch:batch,year:year,semester:semester},
			// 		success:function(res){
			// 			$('#tableBody').empty().html(res);
			// 			// console.log(res);
			// 		}

			// 	})
			// }
			// else{
			// 	$.notify("All select field are mandatory.");
			// }

			var batch_id = $('select[name="batch_id"] option:selected').val();
			var std_class_id = $('select[name="std_class_id"] option:selected').val();
			var section_id = $('select[name="section_id"] option:selected').val();
			var status = 'R';
			var user_id = 'user_id';

			var page = 'student_detail';
			 if(section_id !=''  && batch_id !='' && std_class_id != '' ){
				$.ajax({
					type:'POST',

					url: "{{route('attendance.student_fetch')}}",
					data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,user_id:user_id,page:page,status:status, "_token": "{{ csrf_token() }}",},
					   success:function(res){
						// $('#tableFilter').empty().html(res);
						// $('#tableFooter').show();
						$('#tableBody').empty().html(res);


					}
				});
			}else{
				$.notify("All select field are mandatory.");
			}
		}
	})
</script>
<script>
	$(document).ready(function(){
		$('#std_class_id').on('change',function(e){
			e.preventDefault();
			var std_class_id = $(this).val();
			section_id(std_class_id);
			// qual_docs(std_class_id);
		});
	})
</script>
@endsection

