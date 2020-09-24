 @extends('layouts.main')
 @section('content')

<div class="container">
<div class="col-lg-12">
@include('layouts.comman')
 
<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title"> Students Manage </h4>
			</div>
        </div>
        <div class="card-body">
         	<div class="col-md-12">
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
					</div>								
					<div class="col-md-3">
						<select class="form-control" name="batch_id" id="batch_id">
							<option value="">Select Batch</option>
							@foreach($batches as $key=>$batch)
								<option value="{{$batch->id}}">{{$batch->batch_name}}</option>
							@endforeach
							 
						</select>
					</div>
					
					<div class="col-md-3">
						<select class="form-control" name="section_id" id="section_id"> 
							<option value="">Select Section</option>
							@foreach($sections as $key=>$section)
								<option value="{{$section->id}}">{{$section->section_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3">
						<button class="btn btn-sm btn-primary" id="btnFilter">Search</button>
						<a href="{{ URL::previous() }}" class="btn btn-sm btn-success pull-right">Back</a>
					</div>

				</div>
				<br>
				<div class="row">
					<div class="col-md-12 table-responsive" id="tableFilter">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">

					<table class="table table-striped table-bordered mytable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc">#</th>
								<th class="sorting" >Roll Number</th>
								<th class="sorting" >Photo</th>
								<th>Student Name</th>
								<th class="sorting">Student Name</th>
								<th class="sorting" >Qualification</th>
								<th class="sorting" >Year of Admission</th>
								<th class="sorting" >Batch</th>
								<th class="sorting" >Action</th>
							</tr>
						</thead>
					<tbody>
						
						<tr class="odd">
							<td colspan="10" class="dataTables_empty" valign="top">No data available in table</td>
						</tr>
					</tbody>
					</table>
					
				</div> 
					
										
				</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 20px; display: none" id="tableFooter">
		<div class="col-md-12" >
			<button class="btn btn-sm btn-info pull-right" style="margin-left: 5px;" id="btnTransfer">Transfer</button>
			<button class="btn btn-sm btn-info pull-right" style="margin-left: 5px;" id="btnDropOut">Drop Out</button>
			{{-- <button class="btn btn-sm btn-info pull-right" style="margin-left: 5px;" id="btnForward">Forward</button> --}}
		</div>
		<div class="col-md-12 text-right" style="margin-top: 20px;">
			<label>After Complete Qualification Running Student Transfer to Passout Student List. </label> 
			<button class="btn btn-sm btn-primary " id="btnPassout" style="margin-left: 10px;">Passout</button>
		</div>
	</div>
		<div class="row" style="margin-top: 10px; display: none" id="forwardDiv">
				<div class="col-md-3">
					<select class="form-control" name="std_class_id" id="forwardClass"> 
						<option value="">Select Class</option>
							@foreach($classes as $key=>$class)
								<option value="{{$class->id}}">{{$class->class_name}}</option>
							@endforeach
						</select>
				</div>								
				<div class="col-md-3">
					<select class="form-control" name="batch_id" id="forwardBatch">
						<option value="">Select Batch</option>
						@foreach($batches as $key=>$batch)
							<option value="{{$batch->id}}">{{$batch->batch_name}}</option>
						@endforeach
						 
					</select>
				</div>
				
				<div class="col-md-3">
					<select class="form-control" name="section_id" id="forwardSection"> 
						<option value="">Select Section</option>
						@foreach($sections as $key=>$section)
							<option value="{{$section->id}}">{{$section->section_name}}</option>
						@endforeach
					</select>
				</div>

				<div class="col-md-4" id="forwardSuccess" style="display: none">
					<button class="btn btn-sm btn-danger pull-right" style="margin-left: 5px;" id="forwardCancel">Cancel</button>
					<button class="btn btn-sm btn-success  pull-right" style="margin-left: 5px;" id="forwardNow">Forward Now</button>
				</div>
			</div>
			<div class="row" id="passoutDiv" style="display: none">
					<div class="col-md-4">
						<label>Students Passout Date:</label>
						<input type="text" name="passout_date" class="form-control datepicker" readonly="true" data-date-format="yyyy-mm-dd" placeholder="Enter Passout Date Here..." id="passoutDate" >
					</div>
		
					<div class="col-md-8" id="passoutSuccess" style="display: none;margin-top: 10px;">

						<button class="btn btn-sm btn-default pull-right" style="margin-left: 5px;" id="passoutCancel">Cancel</button>
						<button class="btn btn-sm btn-success pull-right" id="passoutNow" style="margin-left: 5px;"
						>Passout Now</button>
					</div>
				</div>
				<div class="row" id="dropoutDiv" style="display: none;">
					<div class="col-md-4">
						<label>Students Dropout Date:</label>
						<input type="text" name="dropout_date" class="form-control datepicker" readonly="true" data-date-format="yyyy-mm-dd" placeholder="Enter Dropout Date Here..." id="dropoutDate" >
					</div>		
					<div class="col-md-8" id="dropoutSuccess" style="display: none;margin-top: 10px;">

						<button class="btn btn-sm btn-default pull-right" style="margin-left: 5px;" id="dropoutCancel">Cancel</button>
						<button class="btn btn-sm btn-success pull-right" id="dropoutNow" style="margin-left: 5px;"
						>Drop Out Now</button>
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
						$('#tableFooter').show();

					}
				});
			}else{
				alert('please select all field');
			}

		});

		$(function () {
			$(".datepicker").datepicker({ 

				singleDatePicker: true,
				showDropdowns: true,
			});
		});

		$('#qual_catg').on('change',function(e){
			e.preventDefault();
			var qual_catg_code = $(this).val();
			qual_course(qual_catg_code);
			qual_docs(qual_catg_code);
		});

		$('#btnForward').on('click',function(){
			var id = [];
	        $('body .check:checked').each(function(i){
	          id[i] = $(this).val();
	        });
	        if(id.length != '0'){
	        	$('#tableFooter').hide();	        	
	        	$('#forwardDiv').show();
	        	// console.log(id);
	        }else{
	        	alert('Please check at least one checkbox');
	        }
		});

		$('#forwardSection').on('change',function(){
			var forwardClass = $('#forwardClass').val();
			var forwardBatch = $('#forwardBatch').val() ;
			var forwardSection = $('#forwardSection').val() ;
			if(forwardClass != '' && forwardBatch != ''&& forwardSection != ''){
			// alert('classes'+forwardClass+' batch'+forwardBatch+'section'+forwardSection)
				$('#forwardSuccess').show();
			// alert(forwardClass)

			}else{
				$('#forwardSuccess').hide();
			}
		})

		$('#forwardCancel').on('click',function(){
			$('#tableFooter').show();
			$('#forwardClass').val('');	 
			$('#forwardBatch').val('');      	
			$('#forwardSection').val('');      	
			$('#forwardSuccess').hide();
	        $('#forwardDiv').hide();
		});	

		$('#forwardNow').on('click',function(){
			var stud_id = [];
			var section_id = $('#section_id').val();
			// alert(section_id);
			// console.log(parseInt(section_id) + 1 );
	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });
	        var forwardClass = $('#forwardClass').val();
	        // alert(forwardClass);
			var forwardBatch = $('#forwardBatch').val() ;
			var forwardSection = $('#forwardSection').val() ;
			if(section_id == forwardSection){
				alert('Students semester and forward semester are same');
			}else{
				if((parseInt(section_id) + 1) == (parseInt(forwardSection))){
					alert(parseInt(forwardSection)+''+(parseInt(section_id) + 1))

					alert('You did not forward student direct sadfsa');
				}else{
					studentUpdate(stud_id,forwardClass,forwardSection,forwardBatch);
				}
			}
			
		});

		$('#btnTransfer').on('click',function(){
			var stud_id = [];
	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });
	        if(stud_id.length != '0'){
	        	var std_class_id = parseInt($('#std_class_id').val());
				var section_id = parseInt($('#section_id').val());
				var batch_id = parseInt($('#batch_id').val());

				forwardclass = std_class_id == 1 ? (section_id != 1 ? std_class_id + 1 : std_class_id) : (std_class_id == 2 ? (section_id != 3 ? std_class_id + 1 : std_class_id) : (std_class_id == 3 ? (section_id != 5 ? std_class_id + 1 : std_class_id) : (std_class_id == 4 ? (section_id != 7 ? std_class_id +1 : std_class_id ) : std_class_id ) ) ) ;

					forwardcSection = std_class_id == 5 ? (section_id == 9 ? section_id + 1 : section_id ) : section_id + 1;
					
					if(section_id == 10){
						alert('You cannot transfer students');
					}else{
						studentUpdate(stud_id,forwardclass,forwardcSection);
					}
				
	        }
	        else{
	        	alert('Please check at least one checkbox');
	        }


		});	
		$('body').on('click','.selectAll' ,function(){	
			// console.log('select');
			 if ($(this).is( ":checked" )) {
				$('body .check').prop('checked',true);

			 }else{
				$('body .check').prop('checked',false);
			 }
		});

		$('#btnPassout').on('click',function(){
			var stud_id = [];
	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });
	        if(stud_id.length !='0'){
	        	$('#tableFooter').hide();	 
	        	$('#passoutDiv').show();
	        	$('#passoutSuccess').show();
	        }else{
	        	alert('Please check at least one checkbox');
	        }
			
		});

		$('#passoutNow').on('click',function(){
			var passout_date = $('#passoutDate').val();
			var stud_id = [];
	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });
			// console.log(stud_id);
			if(passout_date != ''){
				console.log(passout_date);
				swal({
				  title: "Are you sure?",
				  text: "Make Sure you choose correct student transfer to passout list. If you are not sure then close this pop up window",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((isConfirm) => {
				  if (isConfirm) {
				   	$.ajax({
				   		type:'post',
				   		url: "{{route('passout_student')}}",
				   		data:{passout_date:passout_date,stud_id:stud_id,"_token": "{{ csrf_token() }}"},
				   		success:function(res){
				   			// console.log(res);
				   			swal({
				   				icon:'success',
				   				title: res,
				   				button: true,
				   			}).then((ok)=> {
				   				if(ok){
				   					location.reload();
				   				}
				   			});
				   		}
				   	});
				  } 
				});
			}else{
				alert('Enter Passout Date');
			}
		});


		$('#passoutCancel').on('click',function(){
			$('#tableFooter').show();
			$('#passoutDate').val('');	      	
			$('#passoutSuccess').hide();
	        $('#passoutDiv').hide();
		});

		$('#dropoutCancel').on('click',function(){
			$('#tableFooter').show();
			$('#dropoutDate').val('');	      	
			$('#dropoutSuccess').hide();
	        $('#dropoutDiv').hide();
		});

		$('#btnDropOut').on('click',function(){
			var stud_id = [];
	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });
	        if(stud_id.length !='0'){
	        	$('#tableFooter').hide();	 
	        	$('#dropoutDiv').show();
	        	$('#dropoutSuccess').show();
	        }else{
	        	alert('Please check at least one checkbox');
	        }
			
		});


		$('#dropoutNow').on('click',function(){
			var dropout_date = $('#dropoutDate').val();
			var stud_id = [];
	        $('body .check:checked').each(function(i){
	          stud_id[i] = $(this).val();
	        });
			// console.log(passout_date);
			if(dropout_date != ''){
				swal({
				  title: "Are you sure?",
				  text: "Make Sure you choose correct student transfer to Drop Out list. If you are not sure then close this pop up window",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((isConfirm) => {
				  if (isConfirm) {
				   	$.ajax({
				   		type:'post',
				   		url: "{{route('dropout_student')}}",
				   		data:{dropout_date:dropout_date,stud_id:stud_id,"_token": "{{ csrf_token() }}"},
				   		success:function(res){
				   			 //console.log(res);
				   			swal({
				   				icon:'success',
				   				title: res,
				   				button: true,
				   			}).then((ok)=> {
				   				if(ok){
				   					location.reload();
				   				}
				   			});
				   		}
				   	});
				  } 
				});
			}else{
				alert('Enter Passout Date');
			}
		});


		function studentUpdate(stud_id,forwardClass,forwardSection,forwardBatch){

			swal({
				  title: "Are you sure?",
				  text: "Make Sure you choose correct student to transfer and forward. If you are not sure then close this pop up window sfsf",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((isConfirm) => {
				  if (isConfirm) {
				   	$.ajax({
				   		type:'post',
				   		url: "{{route('forward_transfer_student')}}",
				   		data:{stud_id:stud_id,forwardClass:forwardClass,forwardSection:forwardSection,forwardBatch:forwardBatch,"_token": "{{ csrf_token() }}"},
				   		success:function(res){
				   			// console.log(res);
				   			swal({
				   				icon:'success',
				   				title: res,
				   				button: true,
				   			}).then((ok)=> {
				   				if(ok){
				   					location.reload();
				   				}
				   			});
				   		}
				   	});
				  } 
				});
		}

	
 });

	</script>
 @endsection
