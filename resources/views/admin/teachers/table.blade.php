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
<script >
	$(document).ready(function(){
		$('.mytable').DataTable();

	})
</script>