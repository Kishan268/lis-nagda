@extends('layouts.main')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
			@include('admin.teachers.header')
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">
			<div class="card mb-4">
				<div class="card-header">
					<button class="btn btn-md btn-primary" id="membBtn"><i style="">Teachers</i></button>
					<button class="btn btn-md btn-default" id="teamBtn" ><i style="">Teams</i></button>
			
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">								
							<div class="panel panel-default">
								<div class="panel-body">				
									<div class="row myTableBody" >
										<div class="col-md-12 ">
											@include('admin.teachers.show')	
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

 <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script> 

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> 

{{-- {{route('teams.show', Auth::user()->id)}}
{{route('users.show', Auth::user()->id)}} --}}

{{-- @include('models.login_history') --}}
{{-- @include('models.teacher_case') --}}
{{-- {{ route('login_history')}} --}}
{{-- {{ route('member_cases')}} --}}
<script type="text/javascript">
	$(document).ready(function(){
		$('#membBtn').on('click',function(e){
			e.preventDefault();
			$.ajax({
				type:'get',
				url: '{{route('teachers.show', Auth::user()->id)}}',
				success:function(data){		
					$('.myTableBody').empty().html(data);
				}
			});
			$('#membBtn').removeClass('btn-default');
			$('#membBtn').addClass('btn-primary');
			$('#teamBtn').removeClass('btn-primary');
		});

	});

	

	$('#teamBtn').on('click',function(e){
		e.preventDefault();

 		$.ajax({
			type:'GET',
			url: '{{route('teams.show', Auth::user()->id)}}',
			success:function(data){
				$('.myTableBody').empty().html(data);
			}
		});
		$('#teamBtn').addClass('btn-primary');
		$('#membBtn').removeClass('btn-primary');

	});
</script>
 @endsection
