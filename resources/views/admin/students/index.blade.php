 @extends('layouts.main')
 @section('content')

<div class="container">
	 <div class="col-lg-12">
{{-- @include('layouts.comman') --}}
@include('admin.students.header')


<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">
    </div>
</div>

<div class="container">
	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title">Student List</h4>
			</div>
        </div>
        <div class="card-body">
         	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">				
				<div class="row">								
					<div class="col-md-3">
						<select class="form-control" name="batch_id">
							<option value="">Select Batch</option>
							@foreach($batches as $key=>$batch)
							<option value="{{$batch->id}}">{{$batch->batch_name}}</option>
						@endforeach
							 
						</select>
					</div>
					<div class="col-md-3">
						<select class="form-control" name="std_class_id"> 
							<option value="">Select Class</option>
								@foreach($classes as $key=>$class)
									<option value="{{$class->id}}">{{$class->class_name}}</option>
								@endforeach
							</select>

						</select>
					</div>
					<div class="col-md-3">
						<select class="form-control" name="section_id"> 
							<option value="">Select Section</option>
							@foreach($sections as $key=>$section)
								<option value="{{$section->id}}">{{$section->section_name}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-3">
						<button class="btn btn-sm btn-primary" id="btnFilter">Search</button>
						<a href="{{route('student_detail.create')}}" class="btn btn-sm btn-success pull-right">Add Student</a>
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
					
					<script>
						$(document).ready(function() {
						    $('#DataTables_Table_0').DataTable();
						} );
					</script>					
				</div>
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

					url: "{{route('student_filter')}}",
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
