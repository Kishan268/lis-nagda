@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Time Table<h4 class="panel-title">  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm border-radius">Add Time Table</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
           <div class="app-title full-right">
           @if($message = Session::get('success'))   
              <div class="alert alert-success">{{ $message }}</div>
           @endif
        </div>
          <!-- Card Body -->
          <div class="card-body">
              <form action="{{route('time-table.update',$timeTabale->time_id)}}" method="post" id="form_submit" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">               
                    <div class="col-md-4">
                       <label class="red"> *</label>
                       <label for="name"> Name</label>
                       <input class="form-control input-small " id="exam_name" name="exam_name"  aria-label="Small" type="text" value="{{$timeTabale->name}}">
                       @error('exam_name')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="class_from">Class From </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <select class="form-control onlyDigit input-sm" id="class_from" name="class_from"  value="{{old('class_from')}}">
                            <option value="{{$timeTabale->get_from_class->id}}"> {{$timeTabale->get_from_class->class_name}}</option>
                            @foreach($class as $classes)
                            <option value="{{$classes->id}}"> {{$classes->class_name}}</option>
                            @endforeach
                            </select>
                        </div>
                             @error('class_from')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="class_to">Class To </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <select class="form-control onlyDigit input-sm" id="class_to"  name="class_to"  value="{{old('class_to')}}">
                            <option value="{{$timeTabale->get_to_class->id}}"> {{$timeTabale->get_to_class->class_name}}</option>

                            @foreach($class as $classes)
                            <option value="{{$classes->id}}"> {{$classes->class_name}}</option>
                            @endforeach
                            </select>
                        </div>
                            @error('class_to')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="red"> *</label>
                         <label for="name">Reporting Time</label>
                         <input type="text" name="reporting_time" class="form-control timepicker" value="{{$timeTabale->reporting_time}}">
                         @error('reporting_time')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="red"> *</label>
                        <label for="name">Examination Time</label>
                         <input type="text" name="examination_time" class="form-control timepicker" value="{{$timeTabale->examination_time}}">
                          @error('examination_time')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="red"> *</label>
                        <label for="name">Start Date</label>
                         <input type="text" name="start_date" class="form-control datepicker" value="{{$timeTabale->start_dt}}" required="true" readonly="true">
                         @error('start_date')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-6">
                         <label class="red"> *</label>
                         <label for="name">End Date</label>

                         <input type="text" name="end_date" class="form-control datepicker" value="{{$timeTabale->end_dt}}" required="true" readonly="true">
                         @error('end_date')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="col-md-6">
                      <label class="red"> *</label>
                      <label for="name">Number Of Date</label>
                       <select class="form-control" name="nod" id="nod" value="{{old('nod')}}">
                         <option value="">Select</option> 
                        @for($i=1;$i<=7;$i++)
                         <option value="{{$i}}">{{$i}}</option> 
                        @endfor                        
                       </select>
                       @error('nod')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                       @enderror
                    </div>
                    <div class="col-md-6">
                      <label class="red"> *</label>
                      <label for="name">Remark</label>
                       <textarea class="form-control" name="remark" >{{$timeTabale->remark}}</textarea>
                        @error('remark')
                          <span class="text-danger">
                            <strong>{{$message}}</strong>
                          </span>
                        @enderror 
                    </div>
                  </div>
                  </div>
                </div>
                <hr>
                 <div class="row">
                  <div class="col-md-12">
                     <table class="table table-striped table-bordered">
                         <thead>
                            <tr>
                              <th>Class Name</th>
                              <?php $date = []; ?>
                               @foreach($examTimeTableMast as $class)

                                @foreach($class->get_time_table as $dates)
                                  <?php 
                                     if(!in_array($dates->date, $date)){
                                      $date[] = $dates->date

                                  ?>
                                    <th><input type="text" name="date[]" placeholder="Enter Date" class="form-control datepicker" required="" value="{{$dates->date}}"></th> 
                                  <?php } ?>
                                
                                @endforeach
                              @endforeach
                              
                            </tr>
                          </thead>
                          <tbody>

                            <?php $classData = []; ?>
                            @foreach($examTimeTableMast as $class)
                              @foreach ($class->get_time_table as $subjectsClass) 
                                <?php 
                                    $classData[$subjectsClass->get_class->class_name][] = $subjectsClass->get_subject?$subjectsClass->get_subject->subject_name:'';                       
                                ?>
                              @endforeach
                            @endforeach         
                            @foreach($classData as $key => $value)
                            <tr>
                              <td>{{$key}}</td>
                              @foreach($value as $key => $sub)                  
                                
                                  <td>
                                    <select name="subject_{{$i}}_{{$class->id}}" class="form-control" >
                                      <option value="{{$sub ? $sub : ''}}">{{$sub ? $sub : ''}}</option>

                                    </select>
                                  </td>                    
                              @endforeach
                            </tr>
                            @endforeach    

                          </tbody>
                      </table> 

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 mydiv">
                  </div>
                </div>
                <div class="row">
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
<script>

  $(document).on('click','#submit',function(event){
    event.preventDefault();
    console.log( $('#form_submit').serialize() )
  })

$(document).on('change','#nod',function(){
  var classFrom = $('#class_from').val();
  var classTo = $('#class_to').val();
  var nod = $(this).val();
    if (classFrom != '' && classTo != '') {
      $.ajax({
        method:'post',
        url:'{{route('generateTable')}}',
        data:{'classFrom':classFrom,'classTo':classTo,'nod':nod,"_token": "{{ csrf_token() }}"},
        success:function(data){
          $('.mydiv').html(data)
        }

      })
    }
    else{
      alert('Please Select Class From and  Class To Field....')
    }
    
});
</script>
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
       
        exam_name:{
          required:true
        }, 
        class_from:{
          required:true
        }, 
        class_to:{
          required:true
        },
         reporting_time:{
          required:true
        }, 
        examination_time:{
          required:true
        }, 
        start_date:{
          required:true
        }, 
        end_date:{
          required:true
        }, 
        nod:{
          required:true
        },
        remark:{
          required:true
        },
        'date[]':{
          required:true
        },
     
     
    },
      submitHandler: function(form) {
      form.submit();
      }
 });


</script>
 @endsection
