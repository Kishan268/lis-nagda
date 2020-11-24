<div class="col-md-12 ">
<h4>Teachers ({{count($teachers)}})				
<a href="{{route('teachers.create')}}" class="btn btn-sm btn-primary pull-right">Create  User
</a></h4>
</div>
<div class="col-md-12">
	@if($message = Session::get('success'))
		<div class="alert bg-success">
		{{$message}}
		</div>
	@endif
</div>
<div class="col-md-12 table-responsive mt-4">
	<table  class="table table-striped table-bordered myTable">
		<thead>
			<tr>
				<td>#</td>
				<td>Name</td>
				<td>Email</td>
				<td>Mobile Number</td>
				<td>Status</td>						
				<td>Action</td>						
			</tr>
		</thead>
		<tbody>
		@php $count = 1; @endphp
		@foreach($teachers as $teacher)
		<tr>
			<td>{{$count++}}</td>
			<td>{{$teacher->teacher !=null ? $teacher->teacher->name : ''}}</td>
			<td>{{$teacher->teacher !=null ? $teacher->teacher->email : ''}}</td>
			<td>{{$teacher->teacher !=null ? $teacher->teacher->mobile_no : ''}}</td>						
			<td>{{$teacher->teacher !=null ? ($teacher->status == 'A' ? 'Verified by Email' : 'Pending') : ''}}</td>
			<td>
				<form action="{{route('teachers.destroy',$teacher->teacher->id)}}" method="POST" id="delform_{{ $teacher->id}}">
				@method('DELETE')
				{{-- @role(['lawcompany','lawyer']) --}}
				<a href="javascript:void(0)" onclick="cases('{{ $teacher->teacher->id }}')" title="cases"><i class="fa fa-briefcase btn btn-sm" title="cases"></i></a>
				{{-- @endrole --}}
				<a href="javascript:void(0)" onclick="loginhistory('{{ $teacher->teacher->id }}')" title="teacher login history" data-id="modal" id="loginbtn"><i class="fa fa-clock-o btn btn-sm" style="font-size: 16px"></i></a>

				<a href="{{route('teachers.edit',$teacher->teacher->id)}}" title="edit"><i class="fa fa-edit btn btn-sm" style="font-size: 16px"></i></a>

				<a href="javascript:$('#delform_{{ $teacher->teacher->id}}').submit();"  onclick="return confirm('Are you sure want to delete teacher permanetly?')" title="delete"><i class="fa fa-trash btn btn-sm text-red"></i></a>
				@csrf
				</form>
			</td>
		</tr>
		@endforeach						
		</tbody>
	</table>

</div>
{{-- @include('models.login_history') --}}
{{-- @include('models.teacher_case') --}}
{{-- {{ route('login_history')}} --}}
{{-- {{ route('member_cases')}} --}}
<script>
	function loginhistory($id){
		var id = $id;
		$.ajax({
			type:'POST',
			url: "",
			data: {id:id},
			success:function(res){

				$('#login_time').empty();
				$('#login_time').append("<td>"+(res.last_login_in_at !=null ? res.last_login_in_at : '')+"</td>");
				$('#login_time').append("<td>"+(res.last_logout_in_at != null ? res.last_logout_in_at : '-' )+"</td>");
				$('#login').modal('show');
				// console.log(res.last_login_in_at);
			}
		});
	}
	function cases($id){
		var id = $id;
		$.ajax({
			type:'POST',
			url: "",
			data: {id:id},
			success:function(res){			
				if(res.length != '0'){
					$('#case-body').empty();
					$.each(res,function(index,value){
						$('#case-body').append('<a href="/case_mast/'+value.case_id+',case_diary"><div class="panel panel-default"><div class="panel-body " style="padding: 8px;"><h4 class="text-primary">'+value.case.case_title+'  <span class="pull-right">Reg. Date : '+value.case.case_reg_date+' </span> </h4><span>Client Name: '+value.case.client.cust_name+'</span><span class="pull-right">Court Name : '+value.case.court.court_type_desc+'</span></div></div></a>')
					});
				}
				else{
					$('#case-body').empty();
					$('#case-body').html('<h4 class="text-center">No Records Found</h4>')					
				}		
				$('#cases_modal').modal('show');
			}
		});
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').DataTable();
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

	});
</script>