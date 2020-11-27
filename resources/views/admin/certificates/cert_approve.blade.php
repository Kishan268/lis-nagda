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
              <form action="" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                      <div class="col-md-6">
                         <h2>CBSE AFF. No.{{$settings->cbse_aff_no }} </h2>
                      
                      </div>
                      <div class="col-md-6 full-right">
                         <h2 class="">School Code:-.{{$settings->school_code  }} </h2>
                      </div>
                       <div class="col-md-12 full-center mt-5" align="center">
                         <h2 class=""><u>{{$certifReqApprove->cert_type }}</u> </h2>
                      </div>
                      <div class="col-md-6">
                         <h2>TC. No:- {{$certifReqApprove->studentInfo->student_batch->batch_name}}/{{$certifReqApprove->cert_req_id }} </h2>
                      
                      </div>
                      <div class="col-md-6 full-right">
                         <h2 class="">Admission No:-{{$certifReqApprove->studentInfo->admision_no  }} </h2>
                      </div>

                      <div class="col-md-12 mt-5">
                         1. Name of Pupul:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                         2. Father`s Name/Guardians` Name:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                         3. Mother`s Name:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                         4. Nationality:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                         5. Whether the candidate belongs to schedule tribe:- <strong>No</strong><br>
                         6. Date of first admission in the with class:- <strong>{{date('Y-m-d',strtotime($certifReqApprove->studentInfo->created_at )) }} ({{$certifReqApprove->studentInfo->student_class->class_name  }}) </strong><br>
                         7. Name of Pupul:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                         8. Name of Pupul:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                         9. Name of Pupul:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                         10. Name of Pupul:- <strong>{{$certifReqApprove->studentInfo->f_name  }} {{$certifReqApprove->studentInfo->l_name  }}</strong><br>
                      </div>
                  </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-sm" name="" value="Update">
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
