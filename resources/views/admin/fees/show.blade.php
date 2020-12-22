@extends('layouts.main')
@section('content')
<div class="container">
 	<div class="row mb-4">
 		<div class="col-md-12">
 			@include('admin.fees.header')
 		</div>
 	</div>
 	<div class="row mb-4">
 		<div class="col-md-12">
 			<div class="card">
 				<div class="card-header">
 					<h5 class="card-title">Fees Details
 						<a href="{{route('fees.index')}}" class="btn btn-sm btn-primary pull-right">Back</a>
 					</h5>
 				</div>
 				<div class="card-body table-responsive">
 					<div class="row">       
						<div class="col-md-3 form-group">
							<label class="required">Fees Name</label>
							<input class="form-control" value="{{$fee->fees_name}}" readonly="readonly">
							@error('fees_name')
							   <span class="text-danger error">
							      <strong>{{$message}}</strong>
							   </span>
							@enderror
						</div>
						<div class="col-md-3 form-group">
							<label class="required">Fees Amount</label>
							<div class="input-group mb-0" style="margin-bottom: 0px !important">
							   <div class="input-group-prepend">
							   <span class="input-group-text" id="basic-addon1"><i class="fa fa-rupee"></i></span>
							   </div>
							   <input class="form-control" readonly="readonly" value="{{$fee->fees_amt}}">
							</div>
							@error('fees_amt')
							   <span class="text-danger error">
							      <strong>{{$message}}</strong>
							   </span>
							@enderror
						</div>
						<div class="col-md-4 form-group">
							<label class="required">Header To Be Displayed On Reciept</label>
							<input type="text" class="form-control" readonly="readonly" name="" value="{{Arr::get(RECIEPT_HEADER_NAME,$fee->receipt_head_id)}}">
						</div>
						<div class="col-md-2 form-group">
							<label class="required"> Select Currency </label>
							<input type="text" class="form-control" readonly="readonly" name="" value="{{Arr::get(CURRENCY,$fee->currency_code)}}">						 	
						</div>
					</div> 
					<hr> 
					<div class="row">
						<div class="mb-2 col-md-12">
							<h6 class="font-weight-bold">Fees - Head</h6>
						</div>
						<div class="col-md-12">
							<table class="table table-bordered ">
								<thead>
									<tr >										
										<th>Head Title</th>
										<th>Installable</th>
										<th>Amount</th>
									</tr>
								</thead>
							<tbody>
								@foreach($fee->fees_heads as $fee_head)
								<tr>
									
									<td>{{$fee_head->fees_head->head_name}}</td>
									<td>{{$fee_head->fees_head->is_installable =='1' ? 'Yes' :'No'}}</td> 
									<td class="form-group"><input type="text" name="" class="form-control head_amt" readonly="readonly" value="{{$fee_head->head_amt}}" >                                      
									</td>
								</tr>
								@endforeach
								</tbody>
							</table>
							<input type="hidden" name="non_installable_amnt" value="" id="non_installable_amnt">
							<input type="hidden" name="installable_amnt" value="" id="installable_amnt">
						</div>
                 	</div>
                 	<hr>
                 	<div class="row" >
                 		@foreach($fee->fees_instalments as $key => $fees_instalment)
                 			{{-- <div class="col-md-12 form-group">
                 				<label>Instalment ({{$key+1}})</label>
                 			</div> --}}
							<div class="col-md-4 form-group" id="instal_one"> 
								<label class="required">Instalment Amount</label>
								<input type="text" readonly="readonly" class="form-control instalment_amt">
							</div>
							<div class="col-md-4">
								<label class="required">Start Date</label>
								<input type="text" readonly="readonly" class="form-control datepicker">
							</div>
							<div class="col-md-4">
								<label class="required">Due Date</label>
								<input type="text" readonly="readonly" class="form-control datepicker" >
							</div>
							
						@endforeach
                  	</div>
 				</div>
 			</div>
 		</div>
 	</div>
</div>
@endsection