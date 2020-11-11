@extends('layouts.main')
 @section('content')
<div id="content">
@include('admin.fees.header')

<div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
           <h2><strong>Add Fees New Heads</strong></h2>
			{{-- <a href="index.php?plugin=Fees&amp;action=newheadbulk" class="btn btn-primary"> Create  Bulk Head</a> --}}
			<div class="">
		     @if($message = Session::get('success'))   
		      	<div class="alert alert-success">{{ $message }}</div>
		     @endif
		  </div>
          </div>
         
      <!-- Card Body -->
      <div class="card-body">
       <div class="container-fluid main-content">
		<div style="display: block;" id="Div2" class="block full">
		
        <form action="{{route('fees-heads.store')}}" id="head-form" method="post" novalidate="novalidate">
        	@csrf
			<fieldset>
				<div class="row">
					<div class="col-md-3">
						<label for="feeheader">Fees Heads </label>

						<input class="form-control" id="head_name" name="head_name" type="text">
					  	@error('head_name')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror
					</div>
					
					<div class="col-md-3">
						<label for="feeheader">Fees Amount</label>
						<input class="form-control onlyDigit" id="head_amt" name="head_amt" type="text">
						<div class="has-error" id="errmsgnull">
						@error('head_amt')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror
						</div>       
					</div>

						<div class="col-md-3">
						<label for="feesheadtype">Head Types </label>
						<select id="headtype" name="headtype" class="form-control">
						@foreach($headTypes as $headType)
						<option value="{{$headType}}">{{$headType}}</option>
						@endforeach
						</select>
						     
					</div>

					<div class="col-md-3">
						<label for="feeheader">Head Sequence Order </label>

						<input class="form-control" id="head_sequence_order" name="head_sequence_order" type="number" value="1">
						<div class="has-error">
							<label class="control-label"></label>
						</div>
					</div>
                     
                    </div>
					<div class="row full-right" >
						<div class="heading " style="margin-left: 15px;">                            	
							<button type="button" class="btn btn-sm btn-success pull-right" id="add-row"><i class="fa fa-plus"></i> Add Fine</button>
							<button type="button" class="btn btn-sm btn-danger pull-right" id="remove"><i class="fa fa-plus"></i>Remove</button>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-11">
							<div class="widget-container fluid-height">
								<div class="widget-content padded">
									<table class="table table-bordered invoice-table" id="myTable" onchange="GetActive();">
										<thead>
											<tr><th>Fine Type</th>
											<th>Fine</th>
											<th>No of Days</th>
											<th>Fine Amount</th>
										</tr></thead>
										<tbody id="addNewRow">
											<tr><td>
												<select class="form-control" name="fine_type[]" id="fine_type_1">
													<option value="">Select Fine Type</option>
													@foreach($fineTypes as $fineType)
													<option value="{{$fineType}}">{{$fineType}}</option>
													@endforeach
													
											@error('fine_type')
					                          <span class="text-danger">
					                            <strong>{{$message}}</strong>
					                          </span>
					                        @enderror
												</select>
											</td>
											<td>
												<select class="form-control" name="fine[]" id="fine_1">
													<option value="">Select Fine</option>
													@foreach($fine as $fines)
													<option value="{{$fines}}">{{$fines}}</option>
													@endforeach
												</select>
											</td>
											<td>
												<input type="text" name="fine_day[]" id="fine_day_1" class="form-control" value="0">
											</td>
											<td>
												<input type="text" name="fine_amount[]" id="fine_amount_1" class="form-control" value="0">
											</td>
										</tr></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div id="temp">
						</div>
					</div>
		    <div class="col-md-12">
			   <div class="row">
			   	 <div class="col-md-2">
				<input type="radio" name="applicable_on" value="General" checked=""> <label for="applicable_on">General</label>
			    </div>
			    <div class="col-md-2">
				<input type="radio" name="applicable_on" value="Admission"> <label for="during_admission">Admission</label>
			    </div>
			 <!--   <div class="col-md-2">
				<input type="radio" name="applicable_on" value="during_hostel" > <label for="applicable_on">Hostel</label>
			    </div>
			    <div class="col-md-2">
				<input type="radio" name="applicable_on" value="during_transport" > <label for="applicable_on">Transport</label>
			    </div>-->
			    <div class="col-md-2">
				<input type="checkbox" name="refundable" value="Refundable"> <label for="refundable">Refundable</label>
			    </div>
			    <div class="col-md-4">
				<input type="checkbox" name="installable"> <label for="installable">Instalment Applicable</label>
			    </div>
			   </div>
		    </div>
                    <div style="float:right;">
                     <input class="btn btn-primary" type="submit" value="Add Heads">
                   
                     </div> 
                  </fieldset>
                </form>
              </div>
            </div>
    	</div>
  	</div>
</div>


<div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
           <h2><strong>Fess Heads List</strong></h2>
			{{-- <a href="index.php?plugin=Fees&amp;action=newheadbulk" class="btn btn-primary"> Create  Bulk Head</a> --}}
          </div>
         
      <!-- Card Body -->
<div class="row">
     <div class="col-sm-12">
    <div class="card-body">
       <div class="container-fluid main-content">
				<table class="table table-striped table-bordered mytable">
					<thead>
						<tr>
							<th>Heads Name</th>
							<th>Heads Amount</th>
							<th>Fine Details</th>
							<th>Applicable For</th>
							<th>Refundable</th>
							<th>Installement</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						@foreach($feesHeadMast as $feesHeadMasts)
							<td>{{$feesHeadMasts->name}}</td>
							<td>{{$feesHeadMasts->amount}}</td>
							<td>@foreach($feesHeadMasts->Fine_type as $Fine_type)
								<strong>Type:</strong>{{$Fine_type->fine_type}} , 
								<strong>No.Day:</strong> {{$Fine_type->no_of_days}}, <strong>Amount: </strong>{{$Fine_type->fine_amount}}
							@endforeach</td>
							<td>{{$feesHeadMasts->type}}</td>
							<td>{{$feesHeadMasts->refundable_status == 'Refundable' ? 'Yes' :'No'}}</td>
							<td>{{$feesHeadMasts->instalment_applicable_status == 'on' ? 'Yes' : 'No'}}</td>
							<td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{$feesHeadMasts->id}}">Edit</button></td>
						</tr>
						<!-- Modal -->
							<div id="myModal{{$feesHeadMasts->id}}" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <h4 class="modal-title">Fees Head</h4>
							      </div>
							      <div class="modal-body">
							       <form method="post" action="{{route('fees-heads.update',$feesHeadMasts->id)}}">
							       	@csrf
							       	@method('PUT')
							        	<label for="feeheader">Head Name</label>
										<input type="text" value="{{$feesHeadMasts->name}}" name="head_name" id="head_name_pop" class="form-control" >
							      		
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      	<input type="submit" name="submit" value="Update" class="btn btn-success">
							        </form>
							      </div>
							    </div>

							  </div>
							</div>	
						@endforeach
					</tbody>
				</table> 
			</div>
       		</div>
       	</div>
  	</div>
</div>
</div>
<!-- Trigger the modal with a button -->



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

	$('.selectAll').click(function () {
		$(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
		findIfChecked();
	});
</script>
<script>
$(document).ready(function(){

	var myFuncCalls = 1;

	$('.edithead_name').on('click', function(){
		var id=$(this).data('id');
		
		var head_name = $("#head_name_pop").val($("#head_name_"+id).val());
		var head_name = $("#head_id_pop").val($("#head_id_"+id).val());
	
		});
		
	$('#add-row').on('click', function(){
	
		myFuncCalls++;
		var selectOption = "";
		
		selectOption += "<td><select class='form-control' name='fine_type[]' id='fine_type_"+ myFuncCalls +"'><option value=''>Select Fine Type</option><option value='Fixed'>Fixed</option><option value='Per Day'>Per Day</option></select></td><td><select class='form-control' name='fine[]' id='fine_"+ myFuncCalls +"'><option value=''>Select Fine</option><option value='Amount'>Amount</option><option value='Percentage'>Percentage</option></select></td><td><input type='text' name='fine_day[]' id='fine_day_"+ myFuncCalls +"' class='form-control' value='0'></td><td><input type='text' name='fine_amount[]' id='fine_amount_"+ myFuncCalls +"' class='form-control' value='0'></td>";
		
		document.getElementById("addNewRow").insertRow(-1).innerHTML = selectOption;
		
	});
	
	$('#remove').on("click", function(){
    $('#myTable tr:last').remove();
})

});
</script>

 @endsection