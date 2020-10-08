<table class="table table-striped table-bordered mytable">
	<thead>
		<tr>
			<th><input type="checkbox" name="selectAll" class="selectAll"></th>
			<th>Admission No</th>
			<th>Student Name</th>
			<th>Mobile</th>
		</tr>
	</thead>
	<tbody>
		@php $count = 0; @endphp
		@foreach($studentsMast as $student)
		<tr>
			<td><input type="checkbox" name="s_id[]" class="check" value="{{$student->id}}"></td>
			<td>{{ $student->roll_no }}</td>
			<td>{{ $student->f_name  }} {{ $student->l_name }}</td>
			<td>
				{{ $student->s_mobile }} 
			</td>
			
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
	$('.mytable').DataTable({
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
		searching:true,
		scrolling:true,
	});
</script>