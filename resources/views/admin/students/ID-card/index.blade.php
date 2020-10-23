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
				<h4 class="panel-title">ID-Card</h4>
			</div>
        </div>
        <div class="card-body">
         	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">				
				<div class="row">								
					<div class="col-md-4">
						
						<input type="text" name="aadhar_no" class="form-control" id="aadhar_no">
					</div>
					
					<div class="col-md-3">
						<button class="btn btn-sm btn-primary" id="btnFilter">View ID-Card</button>
						
					</div>

				</div>
				<br>
				<div class="row">
					<div class="col-md-12 table-responsive" id="tableFilter">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
							<div class="card-body">
					         	<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-body">
											<h1>fsdghkj</h1>
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
	</div>
        </div>
      </div>

  </div>
</div>
</div>
<script>
	$(document).ready(function(){
		
		$('#btnFilter').on('click',function(e){
			e.preventDefault();
			var aadhar_no = $('#aadhar_no').val();
			alert(aadhar_no);
			 if(aadhar_no !=''){
				$.ajax({
					type:'POST',
					url: "{{route('get_id_card')}}",
					data: {aadhar_no:aadhar_no, "_token": "{{ csrf_token() }}",},
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
