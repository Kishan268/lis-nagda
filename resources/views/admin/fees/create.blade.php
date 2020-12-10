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
            <h5 class="card-title">Fees
              <a href="{{route('fees.index')}}" class="pull-right btn btn-sm btn-primary">Back</a>
            </h5>
          </div>
          <div class="card-body">
              <form action="{{route('fees.store')}}" id="fees-form1" method="post" autocomplete="off">
              @csrf
                  <div class="row">       
                     <div class="col-md-3 form-group">
                        <label class="required">Fees Name</label>
                        <input class="form-control" id="fees_name" name="fees_name" type="text">
                     </div>
                     <div class="col-md-3 form-group">
                        <label class="required">Fees Amount</label>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fa fa-rupee"></i></span>
                           </div>
                           <input class="form-control" id="fees_amt" name="fees_amt" type="text" readonly="readonly" value="0">
                        </div>
                     </div>
                     <div class="col-md-4 form-group">
                        <label class="required">Header To Be Displayed On Reciept</label>
                        <select class="form-control" name="receipt_head_id" id="receipt_head_id">
                           @foreach(RECIEPT_HEADER_NAME as $key => $headerNames)
                              <option value="{{ $key}}">{{ $headerNames}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-2 form-group">
                        <label class="required"> Select Currency </label>
                         <select class="form-control" name="currency_code" id="currency_code">
                           @foreach(CURRENCY as $key => $currency)
                              <option value="{{ $key}}">{{ $currency}}</option>
                           @endforeach
                           </select>
                     </div>
                  </div>  
                  <hr>
                  <div class="row">
                     <div class="col-md-12">
                        <h6 class="font-weight-bold">Fees - Head</h6>
                     </div>
                     <div class="col-md-12">
                        <table class="table table-bordered ">
                           <thead>
                              <tr >
                                 <th class="form-group"><input id="checkAll" name="checkAll" type="checkbox"></th>
                                 <th>Head Title</th>
                                 <th>Installable</th>
                                 <th>Amount</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($fee_heads as $fee_head)
                                 <tr>
                                    <td><input type="checkbox" name="fees_head[]" class="checkHead" value="{{$fee_head->fees_head_id}}">
                                    </td>
                                    <td>{{$fee_head->head_name}}</td>
                                    <td>{{$fee_head->is_installable =='1' ? 'Yes' :'No'}}</td> 
                                    <td class="form-group"><input type="text" name="head_amt[]" class="form-control head_amt" id="head_amt_{{$fee_head->fees_head_id}}" value="{{(int)$fee_head->head_amt}}" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"></td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3 form-group">
                        <label class="required">Select No of Instalment</label>
                        <select class="form-control" name="no_of_instalment" id="no_of_instalment">
                           @foreach(INSTALMENT_MODE as $key => $instalment_mode)
                              <option value="{{$key}}">{{$instalment_mode}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-3 form-group">
                        <label class="required">Course Selection</label>
                        <select class="form-control" name="courseselection" id="course_selection">

                           @foreach(COURSE_SELECTION as $key => $course_selection)
                              <option value="{{$key}}">{{$course_selection}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="row" >
                     <div class="col-md-4 form-group" id="instal_one"> 
                        <label class="required">Instalment Amount</label>
                        <input type="text" name="instalment_amt[]" readonly="readonly" class="form-control instalment_amt" value="0">
                     </div>
                     <div class="col-md-4">
                        <label class="required">Start Date</label>
                        <input type="text" name="start_dt[]" readonly="readonly" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="Start Date" >
                     </div>
                     <div class="col-md-4">
                        <label class="required">Due Date</label>
                        <input type="text" name="end_dt[]" readonly="readonly" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="Due Date" >
                     </div>
                  </div>
                  <div class="row" id="instalmentBody">
                     
                  </div>
                  <hr>
                  <div class="row" id="course_selection_single">
                     <div class="col-md-3 form-group">
                        <label class="required">Select Class</label>
                        <select class="form-control" name="std_class_id" autocomplete="off" id="std_class_id"> 
                           <option value="all">-- All --</option>
                           @foreach($classes as $key=>$class)
                              <option value="{{$class->id}}">{{$class->class_name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-3 form-group">
                        <label class="required">Select Batch</label>
                        <select class="form-control" name="batch_id" autocomplete="off" id="batch_id">

                        </select>
                     </div>
                     <div class="col-md-3 form-group">
                        <label class="required">Select Section</label>
                        <select class="form-control" name="section_id" autocomplete="off" id="section_id"> 

                        </select>
                     </div>
                     <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                        <label class="required">Select Medium</label>
                        <select class="form-control required" name="medium" id="medium" required="medium">
                           @foreach(MEDIUM as $key=> $value)
                              <option value="{{$key}}" {{$key == 'EM' ? 'selected' : ''}}>{{$value}}</option>
                           @endforeach
                        </select>
                     </div>   
                     <div class="col-md-3 form-group">
                        <label>Select Fee For</label>
                        <select class="form-control" name="feesfor" id="feesfor">
                           <option value="0">Select</option>
                           <option value="1">All Student</option>
                           <option value="2">Some Selected</option>
                        </select>
                     </div>                     
                  </div>
                  <div class="row" id="gen_catg_inc_body" style="display: none">
                     <div class="col-md-4 form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                           <option value="all">-- All --</option>
                           @foreach(GENDER as $key => $gender)
                              <option value="{{$key}}">{{$gender}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-4 form-group">
                        <label>Cast Category</label>
                        <select class="form-control" name="reservation_class_id">
                           <option value="all">-- All --</option>
                           @foreach(CASTCATEGORY as $key => $category)
                              <option value="{{$key}}">{{$category}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="col-md-4 form-group">
                        <label>Include RTE</label>
                        <select class="form-control" name="rte_status">
                           <option value="all">-- All --</option>
                           @foreach(INCLUDE_RTE as $key => $include_rte)
                              <option value="{{$key}}">{{$include_rte}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="row" style="display: none" id="tableRowData">                 
                     <div class="table-responsive col-md-12" id="tableData">
                        
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-4 form-group">
                        <label class="">Online Payment Discount (%)</label>
                        <div class="input-group mb-3">
                           <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1"><i class="fa fa-rupee"></i></span>
                           </div>
                           <input class="form-control" id="online_discount" name="online_discount" type="text" readonly="readonly" value="0">
                        </div>
                     </div>
                    
                     <div class="col-md-3 form-group pt-4">                              
                    
                        <input type="checkbox" value="1" name="refundable" id="inlineCheckbox1"> 
                        Is Fees Refundable 
                        
                     </div>
                     <div class="col-md-3 form-group pt-4"> 
                        <input type="checkbox" value="1" name="is_fees_student_assign" id="is_fees_student_assign" checked=""> 
                        Is Fees Student Assign 
                        
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 form-group">
                        <button class="btn btn-sm btn-success pull-right">Submit</button>
                     </div>
                  </div>
              </form>

          </div>
        </div>
    </div>
  </div>
</div>
@include('layouts.common')
<script>
   $(document).ready(function(){


$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');
      $(document).on('change','.checkHead',function(e){
         e.preventDefault();
         fees_amount_change();
         // console.log(amount);
      });        
      $(document).on('blur','.head_amt',function(e){
         e.preventDefault();
         fees_amount_change();
      })

      function fees_amount_change(){
         var head_id = '';
         var amount = 0;

         $('.checkHead:checked').each(function(i){
            head_id = $(this).val();
            amount = parseInt($('#head_amt_'+head_id).val()) + parseInt(amount);

         });

         $('#fees_amt').val(amount);
         var no_of_instalment = parseInt($('#no_of_instalment').val());

         if(amount !=0){
            var amount = parseInt(amount) / no_of_instalment;
         }
         for(var i =1 ; i <=no_of_instalment; i++){
            $('.instalment_amt').val(amount);
         }

      }

      $(document).on('change','#no_of_instalment',function(e){
         e.preventDefault();
         var no_of_instalment = parseInt($('#no_of_instalment').val());
         var head_id = [];
         $('.checkHead:checked').each(function(i){
             head_id[i] = $(this).val();
         });

         if(head_id.length !=0){

            $('#instalmentBody').empty();
         // console.log(no_of_instalment);
            for(var j =1 ; j < no_of_instalment; j++){
               $('#instalmentBody').append('<div class="col-md-4 form-group" id="instal_one"><label class="required">Instalment Amount <strong class="text-danger">*</strong></label><input type="text" name="instalment_amt[]" readonly="readonly" class="form-control instalment_amt"></div><div class="col-md-4"><label class="required">Start Date <strong class="text-danger">*</strong></label><input type="text" name="start_dt[]" readonly="readonly" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="Start Date"></div><div class="col-md-4"><label class="required">End Date <strong class="text-danger">*</strong></label><input type="text" name="end_dt[]" readonly="readonly" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="Due Date"></div>');
            }
            fees_amount_change();
         }else{
            $("#no_of_instalment").val("1");
           
            $.notify('Select head for fees.','error');
         }
        
      });

      $(document).on('change','#course_selection',function(e){
         e.preventDefault();
         var course_selection = $(this).val();
         if(course_selection == '1'){
            $('#course_selection_single').show();
         }else{
            $('#course_selection_single').hide();
         }
      });

      $(document).on('change','#feesfor',function(e){
         e.preventDefault();
         var feesfor = $(this).val();
         if(feesfor == '1'){
            $('#tableRowData').show();
            $('#tableData').empty();
            $('#gen_catg_inc_body').show();
         }else if(feesfor == '2'){
               var batch_id = $('#batch_id').val();
               var section_id = $('#section_id').val();
               var medium = $('#medium').val();
               console.log(batch_id);
               if(batch_id !=null && section_id !=null){
                  var std_class_id = $('#std_class_id').val();
                  $.ajax({
                     type : 'post',
                     url :'{{route('student_filter')}}', 
                     data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,page:'basic_data_fetch',medium:medium,status:'R', "_token": "{{ csrf_token() }}"},
                     success:function(res){
                        $('#tableRowData').show();
                        $('#tableData').empty().html(res);
                        // console.log(res)
                     }

                  })


               }else{

                  $.notify('Batch and Section field is required.','error');
               }
            $('#gen_catg_inc_body').hide();

         }else{
            $('#tableRowData').show();
            $('#tableData').empty();
            $('#gen_catg_inc_body').hide();
         }
      });

      $('body').on('click','.selectAll' ,function(){  
         // console.log('select');
          if ($(this).is( ":checked" )) {
            $('body .check').prop('checked',true);

          }else{
            $('body .check').prop('checked',false);
          }
      });

      $('body').on('click','#checkAll' ,function(){  
         // console.log('select');
          if ($(this).is( ":checked" )) {
            $('body .checkHead').prop('checked',true);
            // fees_amount_change();
          }else{
            $('body .checkHead').prop('checked',false);
          }
            fees_amount_change();
      });










   })
</script>
@endsection

