<table class="table table-striped table-bordered mytable">
	<thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Description</th>
			<th>Publish Start Date</th>
			<th>Publish End Date</th>
			<th>Created Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@php $count = 1; @endphp
		@foreach($getAllSendData as $getAllSendDatas)
		<tr>
			<td>{{$count++}}</td>
			<td>{{ $getAllSendDatas->circular_title }}</td>
			<td>{{ $getAllSendDatas->circular_description }}</td>
			<td>{{ $getAllSendDatas->date_from_display }}</td>
			<td>{{ $getAllSendDatas->date_to_display }}</td>
			<td>{{ $getAllSendDatas->created_at }}</td>
			<td class="actions">                       	
				<a class="btn btn-xs btn-primary" title="" data-toggle="tooltip" href="{{route('sent-to-faculty-show', $getAllSendDatas->id)}}" data-original-title="view">
				<i class="fa fa-eye"></i>
				</a>
				<a data-original-title="Edit" href="{{route('sent-to-faculty-edit', $getAllSendDatas->id)}}" data-toggle="tooltip" title="" class="btn btn-xs btn-default">
				<i class="fa fa-pencil"></i>
				</a>
				<a data-original-title="Delete" href="index.php?plugin=circularv2&amp;action=deletecircular&amp;id=2539" onclick="return confirm(&quot;Are you sure you want to delete?&quot;)" data-toggle="tooltip" title="" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>                                            

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