@extends('layouts.main')
@section('content')
<section class="content">
@include('admin.attendance.header')
 <style>
    .ui-datepicker-calendar {
        display: none;
    }
    </style>
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
						<a href="{{route('attendance.student_report')}}" class="btn btn-sm {{Request()->segment(3) == 'student' ? 'btn-primary' : 'btn-default'}}">{{__('Student Report')}}</a>
						<a href="{{route('attendance.staff_report')}}" class="btn btn-sm {{Request()->segment(3) == 'staff' ? 'btn-primary' : 'btn-default'}}">{{__('Staff Report')}}</a>
					</div>
				</div>
				<form action="{{route('attendance.staff_report_generate')}}" method="post">
					@csrf
					<div class="row mt-4">
						<div class="col-md-2">
							<input type="text" readonly="" name="attendance_date" value="{{date('Y-m')}}" class="datepicker form-control">
							@error('attendance_date')
								<span class="invalid-feedback text-danger" role="alert">
								<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>				
						<div class="col-md-2">
							<button class="btn btn-sm btn-primary search">Search</button>
						</div>
					</div>
				</form>
				<br>
				<div class="row">
					<div class="col-md-12" id="tableBody" ></div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
</div>
<script >
	$(document).ready(function(){
		$(function () {
			$('.datepicker').datepicker( {
			    format: "yyyy-mm",
			    viewMode: "months", 
			    minViewMode: "months"
			});
		});
	});
</script>
@endsection