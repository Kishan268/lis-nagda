@extends('layouts.main')
@section('content')
<section class="content">
@include('admin.attendance.header')

<div class="container">
 	<div class="card shadow mb-4">
	        <!-- Card Header - Dropdown -->
	    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	          <h6 class="m-0 font-weight-bold text-primary">Staff Attendance</h6>
	          <h4 class="panel-title pull-right"> Today Date :- {{date('d-m-Y')}} | Time: {{date('h:i A')}}</h4>
	    </div>
	        <!-- Card Body -->
	<div class="card-body">
		<div class="col-md-12 m-auto">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th><input type="checkbox" name="all" class="selectAll"></th>
									<th>Name</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
								<tr>
									<td>
										<input type="checkbox" name="staff_id[]"  class="check" value="{{$user->id}}" 
											@if(!empty($attendance_staffs))
											@foreach($attendance_staffs as $attendance_staff)
												@if($attendance_staff->staff_id == $user->id)
													checked="checked" 
												@endif
											@endforeach
										@endif

										>
									</td>
									<td>{{$user->name}}</td>
									<td>
										@if(!empty($attendance_staffs))
										@foreach($attendance_staffs as $attendance_staff)
											@if($attendance_staff->staff_id == $user->id)
												{{$attendance_staff->present}}
											@endif
										@endforeach
									@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="col-md-12">
						<button class="btn btn-sm btn-success btnSubmit">Submit</button>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
</section>
<script>
	$(document).ready(function(){
		$(function () {
			$(".datepicker").datepicker({
				format: 'yyyy-mm-dd'
			});
		});
		$(document).on('click','.selectAll' ,function(){	
			if($(this).is( ":checked" )) {
				$('body .check').prop('checked',true);
			}else{
				$('body .check').prop('checked',false);
			}
		});
		$('.btnSubmit').on('click',function(e){
			e.preventDefault();
			console.log("adsasd")
			var present = [];
			var i = 0;
			$('input[name="staff_id[]"]:checked').each(function() {
				present[i++] = $(this).val();
			});
			var j =0;
			var total = [];
			$('input[name="staff_id[]"]').each(function() {
				total[j++] = $(this).val();
			});
			$.ajax({
				type: 'post',
				url: '{{route('attendance-staff_submit')}}',
				data:{present:present,total:total,"_token": "{{ csrf_token() }}"},
				success:function(res){
					if(res == 'success'){
						$.notify("Staff today attendance successfully submitted",'success');
						
					}else if(res =='warning'){
						$.notify("Staff today attendance already submitted");
					}else{
						$.notify("You can't submit weekend day attendance");
					}
				}

			})
		});
	});
</script>
@endsection