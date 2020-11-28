@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Approve Certificate<h4 class="panel-title">  <a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
              <form action="{{route('certificate_req_approve',$certifReqApprove->cert_req_id)}}" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <input type="hidden" name="cert_req_id" value="{{$certifReqApprove->cert_req_id}}">
                  <input type="hidden" name="school_board" value="{{$settings->school_board}}">
                  <input type="hidden" name="batch_id" value="{{$certifReqApprove->studentInfo->student_batch->id}}">
                  <input type="hidden" name="stu_id" value="{{$certifReqApprove->studentInfo->id}}">
                  <input type="hidden" name="cert_type" value="{{$certifReqApprove->cert_type}}">
                  <input type="hidden" name="cert_type" value="{{$certifReqApprove->cert_type}}">
                  <input type="hidden" name="reason" value="{{$certifReqApprove->reason}}">

                <div class="row">
                  <div class="col-md-12">
                    <div class="row">               
                      <div class="col-md-2">
                         <img src="{{asset($settings->logo !=null ? 'storage/'.$settings->logo : 'storage/admin/student_demo.png')}}" style="width: 100px; height: 100px;" class="form-control">
                        <hr>
                      </div>
                      <div class="col-md-10">
                         <h2><u>{{$settings->title}}</u><br>Website : <a href="{{$settings->website}}">{{$settings->website}}</a> | Email : | Phone : {{$settings->tel1}}</h2>
                      
                      </div><hr>
                    </div>
                  </div>
                   <div class="col-md-12" style="margin-left: 60px;">
                    <div class="row mt-3">
                      <div class="col-md-6">
                         <h2>CBSE AFF. No.{{$settings->cbse_aff_no }} </h2>
                      
                      </div>
                      <div class="col-md-6 full-right">
                         <h2 class="">School Code:-.{{$settings->school_code  }} </h2>
                      </div>
                       <div class="col-md-12 full-center mt-5" align="center">
                         <h2 class=""><u><strong>{{$certifReqApprove->cert_type }}</strong></u> </h2>
                      </div>
                      <div class="col-md-12">
                        <div class="row mt-5">
                          <div class="col-md-6">
                            <h2>TC. No:- {{$certifReqApprove->studentInfo->student_batch->batch_name}}/{{$certifReqApprove->cert_req_id }} </h2>
                      
                          </div>
                          <div class="col-md-6 full-right">
                             <h2 class="">Admission No:-{{$certifReqApprove->studentInfo->admision_no  }} </h2>
                          </div>
                        </div>
                    </div>
                   <div class="col-md-12">
                      <div class="row ">
                        <div class="col-md-12 ">
                           1. Name of Pupil:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                           2. Father`s Name/Guardians` Name:- <strong>
                            @foreach($certifReqApprove->gaudiantInfo as $gaudiantInfos) 
                            {{$gaudiantInfos->relation_id == 1 ? $gaudiantInfos->g_name : ''}}@endforeach</strong><br>
                           3. Mother`s Name:- @foreach($certifReqApprove->gaudiantInfo as $gaudiantInfos) 
                            {{$gaudiantInfos->relation_id == 2 ? $gaudiantInfos->g_name : ''}}@endforeach</strong><br>
                           4. Nationality:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                           5. Whether the candidate belongs to schedule tribe:- <strong>No</strong><br>
                           6. Date of first admission in the with class:- <strong>{{date('Y-m-d',strtotime($certifReqApprove->studentInfo->created_at )) }} ({{$certifReqApprove->studentInfo->student_class->class_name  }}) </strong><br>
                           7. Date of birth(according to admission register):- <strong>({{$certifReqApprove->studentInfo->student_class->class_name  }})  </strong><br>
                           8.Class in which the Pupil last studied:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                           9. School/board Annual Examination last taken with result:- <strong>{{$settings->school_board}}</strong><br>
                           10. Whether faild, if so,once/twice in the same class:- <strong>No</strong><br>
                           11.Subjects studied:- <strong>Subject Names</strong><br>
                           12.Third language in class VIII:- <strong>No</strong><br>
                           13.Month up to which the (pupil has paid):- <strong> </strong><br>
                           14.Total no. of working days present:- <strong>100 </strong><br>
                           15.Wheather NCC cadet/boy scout/Girl Guide(details may be given) conduct:- <strong> </strong><br>
                           16.Genral conduct:- <input type="text" name="general_conduct" required=""><br>
                           17.Date of application for certificate:- <strong>{{date('Y-m-d',strtotime($certifReqApprove->created_at))  }} </strong><br>
                           <input type="hidden" name="apply_date" value="{{date('Y-m-d',strtotime($certifReqApprove->created_at))  }}">
                           18.Date of issue of certificate:- <input type="text" name="issue_date" class="datepicker" required=""><br>
                           19.Reason for leaving the school:- <strong>{{$certifReqApprove->reason  }} </strong><br>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                <div class="row mt-3">
                  <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-sm" name="" value="Approve">
                  </div>
                </div>
              </form>
          </div>    
  </div>
</div>

<style >
  .border-radius{
    border-radius: 4px;
  }
  .form-control{
    height: 34px;
  }
  label{
    font-size: 15px;
  }
  .red
      {
        color:red;
      }
</style>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript">
  
   $.validator.addMethod("mobile_regex", function(value, element) {
    return this.optional(element) || /^\d{10}$/i.test(value);
    }, "Please Enter No Only.");
    
    $.validator.addMethod("password_regex", function(value, element) {
    return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/i.test(value);
    }, "Password must contain at least 1 lowercase, 1 uppercase, 1 numeric and 1 special character");
    
    $.validator.addMethod("email_regex", function(value, element) {
    return this.optional(element) || /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/i.test(value);
    }, "The Email Address Is Not Valid Or In The Wrong Format");
    
    $.validator.addMethod("name_regex", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ]{2,100}$/i.test(value);
    }, "Please choose a name with only a-z 0-9.");
    
    $("#form_submit").validate({
        errorElement: 'required',
        errorClass: 'help-inline',
      
      rules: {
       
        title:{
          required:true
        }, 
         
        email:{
          required:true
        },
         website:{
          required:true
        },  
        mobile1:{
          required:true,
          minlength:10,
          maxlength:12,
          number: true
        }, 
         
        tel1:{
          required:true,
          minlength:10,
          maxlength:12,
          number: true
        },
        
        address:{
          required:true
        }, 
        city_name:{
          required:true
        },
        state_code:{
          required:true
        }, 
        country_name:{
          required:true
        }, 
        zip_code:{
          required:true
        }, 
        school_code:{
          required:true
        },
        
     
     
    },
      submitHandler: function(form) {
      form.submit();
      }
 });



 $(document).ready(function(){
    $("#txtFromDate").datepicker({
        numberOfMonths: 2,
        onSelect: function(selected) {
          $("#txtToDate").datepicker("option","minDate", selected)
        }
    });
    $("#txtToDate").datepicker({ 
        numberOfMonths: 2,
        onSelect: function(selected) {
           $("#txtFromDate").datepicker("option","maxDate", selected)
        }
    });  
});
</script>
 @endsection
