@extends('layouts.main')
@section('content')
<div class="container">
	{{-- <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			@include('admin.hrms.header')
		</div>
	</div> --}}
	<div class="row mb-4">
		<div class="col-md-12 col-sm-12 col-lg-12">
			 <div class="card">
		        <div class="card-header">
					<h4 class="card-title">Employees List <a href="{{route('employees.create')}}" class="btn btn-sm btn-success pull-right">Add Employee</a></h4>
		        </div>
       			<div class="card-body">         			
					{{-- @include('layouts.filter_common') --}}
				
					<div class="row mt-3 mb-5">
						<div class="col-md-12 table-responsive" id="tableFilter">
							<table class="table table-striped table-bordered mytable" >
								<thead>
									<tr role="row">
										<th class="sorting_asc">#</th>
										<th class="sorting" >Employee Name</th>
										<th class="sorting" >Photo</th>
										<th class="sorting">Designation</th>
										<th class="sorting" >Status</th>
										<th class="sorting" >Action</th>
									</tr>
								</thead>
								<tbody>									
										@if(empty($employeeData))
										<td colspan="10" class="dataTables_empty" valign="top">No data available in table</td>
										@endif
										<?php $count = 1; ?>
										@foreach($employeeData as $employeeDatas)
									<tr class="odd text-center" >

											<td>{{$count++}}</td>
											<td>{{$employeeDatas->name}}</td>
											<td><img src="{{asset($employeeDatas->photo !=null ? 'storage/'.$employeeDatas->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;"></td>
											<td>{{$employeeDatas->deignation}}</td>
											<td><form action="{{route('employees.destroy', $employeeDatas->id)}}" method="POST" id="delform_{{$employeeDatas->id}}">
											@method('DELETE')
											@csrf
											<?php if ($employeeDatas->status == '1') { ?>
												<button class="btn-success" onclick="return confirm('Are you sure you want to deactive this employee?');">Active</button>
											<?php }elseif($employeeDatas->status == '0'){ ?>
												<button class="btn-danger" onclick="return confirm('Are you sure you want to active this employee?');">Deactive</button>
											<?php } ?> 
											</form>
											</td>
											<td><span class="mr">
												<a href="{{route('employees.edit', $employeeDatas->id)}}" ><i class="  fa fa-edit text-green" style="font-size: 16px;"></i></a></span>
											<span class="mr">
												<a href="{{route('employees.show', $employeeDatas->id )}}" ><i class=" fa fa-eye text-primary" style="font-size: 16px;"></i></a>
											</span>
									</td>
									</tr>
									@endforeach
								</tbody>
							</table>						
						</div> 
					</div>					
		        </div>
		    </div>
		</div>
	</div>
</div>
{{-- @include('layouts.common') --}}
<script>
	$(document).ready(function(){

		$('#btnFilter').on('click',function(e){
			e.preventDefault();
			var batch_id 	 = $('select[name="batch_id"] option:selected').val();
			var std_class_id = $('select[name="std_class_id"] option:selected').val();
			var section_id 	 = $('select[name="section_id"] option:selected').val();
			var medium		 = $('select[name="medium"] option:selected').val();
			var status = 'R';
			var user_id = 'user_id';

			var page = 'student_detail';
			 if(section_id !=''  && batch_id !='' && std_class_id != '' ){
				$.ajax({
					type:'POST',
					url: "",
					data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,user_id:user_id,page:page,medium:medium,status:status, "_token": "{{ csrf_token() }}"},
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
