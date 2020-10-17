
 @extends('layouts.main')
 @section('content') 
 <meta name="csrf-token" content="{{ csrf_token() }}" /> 
<div class="container">
    <div class="row mt-2">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header">
        <div class="panel-heading">
              <h4 class="panel-title">  SMS Report 
                 <a href="{{ URL::previous() }}"><button class="btn btn-success" style="float:right;">Back</button></a>
              </h4>
          </div>          
        </div>
    <div class="card-body">
      <div class="panel panel-default">
        <div class="col-md-12 mt-3">
    		<table class="table table-bordered table-striped mytable" id="facultiestable">
				<thead>
					<tr>
						<th>#</th>
						<th>User Name</th>
						<th>Type</th>
						<th>Date</th>
						<th>Mobile No </th>
						<th>Status </th>
						<th>Message </th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					@foreach($getComposeSms as $value)
					<tr>
						@if(empty($getComposeSms))
						<td colspan="10">No Data found</td>
						@endif
						<td>{{$count++}}</td>
						<td>@foreach($value['get_user'] as $value1) {{$value1->name }} 
							@endforeach
						</td>
						<td> @foreach($value['get_user'] as $value2) <?php if($value2->user_flag =='T'){ echo "Teacher";}else if($value2->user_flag =='S'){ echo "Student";}  ?>
							@endforeach
							</td>
						<td>{{$value->created_at}}</td>
						<td>@foreach($value['get_user'] as $value3){{$value3->mobile_no }}@endforeach</td>
						<td>@foreach($value['get_user'] as $value4)<?php if($value4->compose_message_sent == 0){ echo "Failed";}else if($value4->compose_message_sent ==1){ echo "Send";}  ?>
							@endforeach
							
						</td>
						<td>{{$value->compose_sms_content}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
            </div>
       		</div>
          <hr>
      </strong>
 </div>
</div>

 @endsection('content')
