
<table class="table table-bordered table-striped" id="studenttable">
	<thead>
		<tr>
			<th>
			<input type="checkbox" name="all" class="selectAll" checked="">
			</th>
			<th>Roll Number</th>
			<th>Name</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		@foreach($getData as $student)
			<tr>
				@if(empty($getData))
				<td colspan="10">No Data found</td>
				@endif
				<td>
					<input type="checkbox" name="s_id[]"  class="check" value="{{$student->user_data['id']}}" 
						@if(!empty($attendance_students))
						@foreach($attendance_students as $attendance_student)
							@if($attendance_student->s_id == $student->id)
								checked="checked" 
							@endif
						@endforeach
					@endif checked="">
				</td>
				<td>{{$student->roll_no}}</td>
				<td>{{$student->f_name .' '. $student->l_name }}</td>
				<td>{{$student->email }}</td>
				
			</tr>
		@endforeach
	</tbody>
</table>

<style >
	.mr{
		margin-right: 10px;
	}
</style>
<script >
	$('#studenttable').DataTable({
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
		searching:true,
		scrolling:true,
	});

</script>
