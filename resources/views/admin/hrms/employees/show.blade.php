@extends('layouts.main')
@section('content')

<style type="text/css">
    .text-danger{
        font-size: 12px;
    }
</style>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card">
               <div class="card-header">
                    <h6 class="card-title">Show Employee
                        <a href="{{route('employees.index')}}" class="btn btn-sm btn-primary pull-right"> Back</a>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                            <div class="tabs">
                                <ul class="nav nav-tabs tab-links">
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="#basic_details">Basic Details</a>
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="#academic_dtl" >Academic Details</a>
                                    </li>
                                    {{-- <li class="nav-item"> 
                                        <a class="nav-link" href="#guardian_info" >Guardian Info</a>
                                    </li> --}}
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="#employee_address" > Address</a>
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="#bank_details">Bank Details</a>
                                    </li>
                                    <li class="nav-item"> 
                                        <a class="nav-link" href="#emp_documentument" > Document</a>
                                    </li>
                                </ul>
                    
                                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                    

                                    <div class="tab-content mt-4 p-2" style="font-size: 15px !important; background-color: whitesmoke !important;" >
                                        <div class="tab-pane tab  active" id="basic_details" >
                                            <section>
                                                <h3 class="mb-3">Basic Details</h3>
                                                <hr/>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label >Employee Photo</label>
                                                        <img src="{{asset($editEmp->photo !=null ? 'storage/'.$editEmp->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label >Employee Signature</label>
                                                         <img src="{{asset($editEmp->photo !=null ? 'storage/'.$editEmp->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label class="required">Full Name</label>
                                                        <input type="text" name="name" id="name" value="{{$editEmp->name}}" class="form-control required" required="required" readonly="">
                                                      
                                                    </div>  
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label class="required">Mobile Number</label>
                                                        <input type="text" name="mobile" class="form-control required" readonly=""> 
                                                        
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label class="required">Mobile Number2</label>
                                                        <input type="text" name="mobile1" class="form-control required"  value="{{$editEmp->mobile1}}" readonly=""> 
                                                       
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Email Address</label>
                                                        <input type="text" name="email" class="form-control required" value="{{$editEmp->email}}" readonly=""> 
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 form-group col-xs-6">
                                                        <label class="required">Date of Birth</label>
                                                        <input type="text" name="dob" class="form-control  required dob" data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}" value="{{$editEmp->dob}}" required="required" readonly="">
                                                    </div>
                                                    
                                                    <div class="col-md-3 col-sm-3 form-group col-xs-6">
                                                        <label class="required">Gender</label>
                                                        
                                                         <input type="text" readonly="" name="" value="{{Arr::get(GENDER,$editEmp->gender)}}" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 col-sm-3 form-group col-xs-6">
                                                        <label>Religion</label>
                                                       <input type="text" readonly="" name="" value="{{$editEmp->religion_id !=null ? Arr::get(RELIGION,$editEmp->religion_id) : ''}} " class="form-control">
                                                    </div>
                                                
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Blood Group</label>
                                                        <input type="" name="" value="{{$editEmp->blood_group !=null ? Arr::get(BLOODGROUP,$editEmp->blood_group) : ''}}" class="form-control" readonly>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Age</label>
                                                        <input type="text" value="{{$editEmp->age}}" name="age" class="form-control age" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Joining Date</label>
                                                        <input type="text" name="joining_date" class="form-control datepicker required joining_date"  data-date-format="yyyy-mm-dd"  value="{{$editEmp->joining_date}}" placeholder="{{date('Y-m-d')}}" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Year Of Experience</label>
                                                        <input type="text" name="year_of_experince" value="{{$editEmp->addhar_card}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-xs-6 col-sm-6 form-group">
                                                        <label class="required">Employee Type</label>
                                                        
                                                        <input type="" name="" value="{{$editEmp->emp_type !=null ? Arr::get(EMP_TYPE,$editEmp->emp_type) : ''}}" class="form-control" readonly>
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-group row">
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Aadhar Card Number</label>
                                                        <input type="text" name="addhar_card" value="{{$editEmp->addhar_card}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Pan Card Number</label>
                                                        <input type="text" name="pan_card" value="{{$editEmp->pan_card}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Voter ID Number</label>
                                                        <input type="text" name="voter_id" value="{{$editEmp->voter_id}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Driving Licence</label>
                                                        <input type="text" name="driving_licence" value="{{$editEmp->driving_licence}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Passport ID</label>
                                                        <input type="text" name="passport_id" value="{{$editEmp->passport_id}}" class="form-control" readonly="">
                                                    </div>
                                                    
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Old PF Number</label>
                                                        <input type="text" name="old_pf_number" value="{{$editEmp->old_pf_number}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>New PF Number</label>
                                                        <input type="text" name="new_pf_number" value="{{$editEmp->new_pf_number}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>New Uan Number</label>
                                                        <input type="text" name="old_uan_number" value="{{$editEmp->old_uan_number}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Old Uan Number</label>
                                                        <input type="text" name="new_uan_number" value="{{$editEmp->new_uan_number}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>Old Esi Number</label>
                                                        <input type="text" name="old_esi_number" value="{{$editEmp->old_esi_number}}" class="form-control" readonly="">
                                                    </div>
                                                    <div class="col-md-3 col-sm-6 form-group col-xs-6">
                                                        <label>New Esi Number</label>
                                                        <input type="text" name="new_esi_number" value="{{$editEmp->new_esi_number}}" class="form-control" readonly="">
                                                    </div>
                                                </div>
                                                
                                            </section>
                                            <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#next_tab2" class="nav-link btn btn-sm bg-success text-white nextButton">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                       <div class="tab-pane tab" id="academic_dtl">
                                            <h3 class="mb-3">Academic Details</h3>
                                            <hr>
                                            <section>
                                              <div class="row" >
                                                    <div class="col-md-12 col-xl-12 col-sm-12" style="border:1px solid #eee9e9; " id="acadmic_dtl" >

                                                    </div>
                                              </div>
                                            </section>
                                            <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
                                                </li>
                                            </ul>
                                        </div>   
                                        <div class="tab-pane tab" id="employee_address">
                                            <h3 class="mb-3">Employee Address</h3>
                                            <hr/>
                                            <section>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Permanent Address:</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row form-group">
                                                        <div class="col-md-4 ">
                                                            <label class="required">Address Line</label> 
                                                            <input type="text" class="form-control" name="p_address" id="p_address" value="{{$editEmp->p_address}}" readonly="">

                                                        </div>
                                                        <div class="col-md-4 ">
                                                            <label class="required">City Name</label>
                                                            <input type="text" class="form-control" id="p_city" name="p_city" value="{{$editEmp->p_city}}" readonly="">     
                                                        </div>
                                                        
                                                        <div class="col-md-4 ">
                                                            <label class="required">State Name</label>
                                                            <input type="text" class="form-control" name="p_state" id="p_state" value="{{$editEmp->p_state ?? 'Madhya Pradesh'}}"  readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="row">       
                                                        <div class="col-md-4 ">
                                                            <label class="required">Zip Code</label>
                                                            <input type="text" name="p_zip_code" class="form-control" id="p_zip_code" value="{{$editEmp->p_zip_code}}" readonly="">
                                                        </div>
                                                        <div class="col-md-4 ">
                                                            <label class="required">Country Name</label>
                                                            <input type="text" class="form-control" name="p_country" id="p_country" value="{{$editEmp->p_country ?? 'India'}}" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Local Address:</h5>                                      
                                                    </div>
                                                    <div class="card-body">
                                                       {{--  <div class="row form-group">
                                                            <div class="col-md-12 ">
                                                                <label><input type="checkbox" name="same_as" id="p_l_same" {{$editEmp->same_as == 1 ? 'checked' : ''}} />
                                                                </label>
                                                                <label>Same as Permanent Address</label><span class="text-muted">(Click to copy permanent address data)</span>
                                                            </div>
                                                        </div> --}}
                                                        <div class="row form-group">
                                                            <div class="col-md-4 ">
                                                                <label class="required">Address Line</label>
                                                                <input type="text" class="form-control loc_addr" name="l_address" id="l_address" value="{{$editEmp->l_address}}" readonly="">
                                                            </div>                                              
                                                            <div class="col-md-4 ">
                                                                <label class="required">City Name</label>
                                                                <input type="text" class="form-control loc_addr" name="l_city" id="l_city" value="{{$editEmp->l_city}}" readonly="">
                                                            </div>              
                                                            <div class="col-md-4 ">
                                                                <label class="required">State Name</label>
                                                                <input type="text" class="form-control loc_addr" name="l_state" id="l_state"  value="{{$editEmp->l_state ?? 'Madhya Pradesh'}}" readonly="">
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 ">
                                                                <label class="required">Zip Code</label>
                                                                <input type="text" name="l_zip_code" class="form-control loc_addr" id="l_zip_code" value="{{$editEmp->l_zip_code}}" readonly="">
                                                            </div>
                                                            <div class="col-md-4 ">
                                                                <label class="required">Country Name</label>
                                                                <input type="text" class="form-control loc_addr" name="l_country" id="l_country" value="{{$editEmp->l_country ?? 'India'}}" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                             
                                            </section>
                                           <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane tab" id="bank_details">
                                            <h3 class="mb-3">Bank Details</h3>
                                            <hr>
                                            <section>
                                                <div class="row form-group">
                                                    <div class="col-md-6 col-sm-6 form-group col-xs-6">
                                                        <label>Bank Name</label>
                                                        <input type="text" name="bank_name" class="form-control" value="{{$editEmp->bank_name}}" readonly=""> 

                                                    </div>
                                                    <div class="col-md-6 col-sm-6 form-group col-xs-6">
                                                        <label>Branch</label>
                                                        <input type="text" name="bank_branch" class="form-control" value="{{$editEmp->bank_branch}}" readonly="">
                                                    </div>

                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                                        <label>Account Name</label>
                                                        <input type="text" name="account_name" class="form-control" value="{{$editEmp->account_name}}" readonly="">
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                                        <label>Account Number</label>
                                                        <input type="text" name="account_no" class="form-control" value="{{$editEmp->account_no}}" readonly="">
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 form-group col-xs-6">
                                                        <label>IFSC CODE</label>
                                                        <input type="text" name="ifsc_code" class="form-control" id="ifsc_code" value="{{$editEmp->ifsc_code}}" readonly="">
                                                    </div>
                                                </div>
                                            </section>
                                            <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane tab" id="emp_documentument">
                                            <h3 class="mb-3">Employee Documents</h3>
                                            <hr/>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-12">                  
                                                        <input type="hidden" name="employeeId" id="employeeId" value="">        
                                                        <table class="table table-bordered" style="" id="emp_document">
                                                            <thead>
                                                                <tr style="background-color: #e3f2fd;">
                                                                    <th>Document Title  </th>
                                                                    <th>Document Description </th>
                                                                    <th>File </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="docTBody">
                                                            </tbody>
                                                        </table>           
                                                    </div>           
                                                </div>                                        
                                            </section>      
                                            <ul class="tab-links nav nav-tabs pull-right mt-3">
                                                <li class="nav-item">
                                                    <a href="#back_tab1" class="nav-link btn btn-sm text-white bg-primary prevButton">Prev</a>
                                                </li>
                                                <li class="nav-item">
                                                    <input type="submit" name="submit" value="Submit"  class="btn bg-success text-white">
                                                </li>
                                            </ul>                               
                                        </div>
                                    </div>
                                </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
    <script >
    $(document).ready(function(){   
        swal({
          text: "{{$message}}",
          icon : 'success',
        });
       });
    </script>   
@endif

@include('layouts.common')
<script type="text/javascript">

// For tabing ..........    
$(document).ready(function() {
    jQuery('.tabs .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');

        // Show/Hide Tabs
        jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });


    jQuery('.nextButton').on('click', function() {
        var $activeTab = $('.tab-links li.active');
        var $wrapper = jQuery(this).closest('.tabs');
        var indexActive = $wrapper.find('li.active').index();
        $wrapper.find('li').eq(indexActive + 1).find('a').click();
    });

    jQuery('.prevButton').on('click', function() {
        var $activeTab = $('.tab-links li.active');
        var $wrapper = jQuery(this).closest('.tabs');
        var indexActive = $wrapper.find('li.active').index();
        $wrapper.find('li').eq(indexActive - 1).find('a').click();
    });
});

$('.dob').on('blur',function(e){
    e.preventDefault();
        var c_d = new Date();
        year = c_d.getFullYear() - 8;
        date = new Date($(this).val());

        age = Math.floor((c_d.getTime() - date.getTime()) / (365.25 * 24 * 60 * 60 * 1000));
        
        $('.age').val(age).attr('readonly','true');
});

$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');
$('th.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

$(document).ready(function(){


    $('.status').on('change',function(e){
        e.preventDefault();
        var status = $(this).val();
        // console.log(status);
         passout_date(status);
        
    });

    var status = "{{old('status')}}";
    if(status !=''){
         passout_date(status);
    }

    function passout_date(status){
        if(status == 'P'){
            $('.passout_date').show();
        }else{
            $('.passout_date').hide();
        }
    } 


    var acadmic_dtl  = 0;
    @if(old('qual_name') !=null)
        @if(count(old('qual_name')) !=0)
            var acadmic_dtl = {{count(old('qual_name')) }};
            
        
        @endif
    @endif
    

   var k =0;
    @php 
        $k =0;
        $count_acadmic_dtl = count($editEmp->emp_qaul);
    @endphp


    $('#acadmic_dtl').append('<div id="row'+k+'"><div class="row form-group "><div class="form-group row qual_name"><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Qualification Name <strong class="text-danger">*</strong></label><input type="" name="" value="{{$editEmp->emp_qaul[$k]->qual_name !=null ? Arr::get(QUALIFICATION_NAMES,$editEmp->emp_qaul[$k]->qual_name) : ''}}" class="form-control" readonly></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="">Percent <strong class="text-danger">*</strong></label><input type="text" name="percent[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->percent}}" readonly=""></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Grade <strong class="text-danger">*</strong></label><input type="text" name="grade[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->grade}}" readonly=""></div><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Year Of Passing <strong class="text-danger">*</strong></label></label><input type="text" name="year_of_passing[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->grade}} " readonly=""></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label >Qualification Doc</label><br><img src="{{asset($editEmp->photo !=null ? 'storage/'.$editEmp->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;" ></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Qualification Description<strong class="text-danger">*</strong></label><textarea type="text" name="qual_desc[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->qual_desc}}" readonly="">{{$editEmp->emp_qaul[$k]->qual_desc}}</textarea></div><hr></div></div>');


    // for(var z = 0; z < acadmic_dtl; z++){
        // $('#acadmic_dtl').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_acadmic_dtl"><i class="fa fa-plus"></i> Add More</a></div></div>'+html_div+'</div>');

    // }
        

                            
    k++;

    @php
    $k++;
    while ($k < $count_acadmic_dtl) {
    @endphp

    $('#acadmic_dtl').append('<div id="row{{$k}}"><div class="row form-group "><div class="form-group row qual_name"><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Qualification Name <strong class="text-danger">*</strong></label><select name="qual_name[]" class="form-control " readonly="">@foreach(QUALIFICATION_NAMES as $key =>$val)<option value="{{$key}}" {{$editEmp->emp_qaul[$k]->qual_name == $key ? 'selected' : ''}}>{{$val}}</option>@endforeach</select></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="">Percent <strong class="text-danger">*</strong></label><input type="text" name="percent[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->percent}}" readonly=""></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Grade <strong class="text-danger">*</strong></label><input type="text" name="grade[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->grade}}" readonly=""></div><div class="col-sm-6 form-group col-md-4 col-xs-6 "><label class="">Year Of Passing <strong class="text-danger">*</strong></label></label><input type="text" name="year_of_passing[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->grade}}" readonly=""></div><div class="col-md-4 col-xs-6 col-sm-6 form-group "><label >Qualification Doc</label><br><img src="{{asset($editEmp->photo !=null ? 'storage/'.$editEmp->photo : 'img/student_demo.png')}}" style="width: 30px; height: 30px;"></div><div class="col-md-4 col-sm-6 form-group col-xs-6 "><label class="required">Qualification Description<strong class="text-danger">*</strong></label><textarea type="text" name="qual_desc[]" class="form-control " value="{{$editEmp->emp_qaul[$k]->qual_desc}}" readonly="">{{$editEmp->emp_qaul[$k]->qual_desc}}</textarea></div><hr></div></div>');

    @php
    $k++;
    }
    @endphp
    k = "{{$k}}";

   
    

});


var j = 0;
@php
        $j = 0;
        $count_docs = count($editEmp->emp_doc);
@endphp

$('#docTBody').append('<tr id="doc_row_'+j+'"><td><input id="doc_name" name="doc_name[]" class="form-control" type="text" placeholder="Enter doc title" value="{{$editEmp->emp_doc[$j]->doc_name}}" readonly=""></td><td><textarea id="doc_desc" name="doc_desc[]" class="form-control doc_desc" placeholder="Enter doc description" value="" rows="2" cols="2" readonly="">{{$editEmp->emp_doc[$j]->doc_desc}}</textarea></td><td><img src="{{asset($editEmp->emp_doc[$j]->doc_file !=null ? 'storage/'.$editEmp->emp_doc[$j]->doc_file : 'img/student_demo.png')}}" style="width: 50px; height: 50px;"> </td></tr>');

@php
    $j++;
    while ($j < $count_docs) {
@endphp
     $('#docTBody').append('<tr id="doc_row_{{$j}}"><td><input id="doc_name" name="doc_name[]" class="form-control" type="text" placeholder="doc title" value="{{$editEmp->emp_doc[$j]->doc_name}}" readonly=""></td><td><textarea id="doc_desc" name="doc_desc[]" class="form-control doc_desc" placeholder="doc description" value="" rows="2" cols="2" readonly="">{{$editEmp->emp_doc[$j]->doc_desc}}</textarea></td><td><img src="{{asset($editEmp->emp_doc[$j]->doc_file !=null ? 'storage/'.$editEmp->emp_doc[$j]->doc_file : 'img/student_demo.png')}}" style="width: 50px; height: 50px;"> </td></tr>');
@php
    $j++;
}
@endphp



</script>

 @endsection
