@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Create Discount Type<h4 class="panel-title">  <a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
              <form action="{{route('settings.store')}}" method="post" id="form_submit" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">               
                    <div class="col-md-4">
                       <label class="red"> *</label>
                       <label for="discount_code"> Discount Code</label>
                       <input class="form-control input-small " id="discount_code" name="discount_code"  aria-label="Small" type="text" value="{{old('discount_code')}}">
                       @error('discount_code')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="discount_name">Discount Name </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <input type="text" class="form-control onlyDigit input-sm" id="discount_name"  name="discount_name"  value="{{old('discount_name')}}" >
                            
                        </div>
                        @error('discount_name')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                         <label for="gender">gender</label>
                         <select name="gender" class="form-control" value="{{old('website')}}">
                          <option>Selete gender</option>
                           @foreach(GENDER as $key => $gender)
                           <option value={{$key}}>{{$gender}}</option>
                           @endforeach
                         </select>
                         @error('gender')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>  
                    <div class="col-md-4">
                        <label class="red"> *</label>
                         <label for="discount_no_type">Discount no type</label>
                         <select name="discount_no_type" class="form-control" value="{{old('website')}}">
                           <option>Selete Discount no type</option>
                          
                         </select>
                         @error('discount_no_type')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>                    
                    <div class="col-md-4">
                        <label class="red"> *</label>
                         <label for="discount_mode">Discount Mode</label>
                         <select name="discount_mode" class="form-control" value="{{old('website')}}">
                           <option>Selecte Discount Mode</option>
                           <option value="persantage">%</option>
                           <option value="rupee">rupee</option>
                         </select>
                         @error('discount_mode')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="discount_amount">Discount Amount</label>
                         <input type="text" name="discount_amount" class="form-control " value="{{old('discount_amount')}}"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" >
                          @error('discount_amount')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="discount_desc">Discount description</label>
                         <textarea type="text" name="discount_desc" class="form-control ">{{old('discount_desc')}}</textarea> 
                          @error('discount_desc')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                  <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-sm" name="" value="Submit">
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
        logo:{
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
        school_board:{
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
