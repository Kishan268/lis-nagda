@extends('layouts.main')
@section('content')
<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Time Table<h4 class="panel-title">  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm border-radius">Add Time Table</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm border-radius ">Back</a></h4></h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
              <form action="{{route('time-table.store')}}" method="post" id="form_submit" autocomplete="off">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                       <div class="row">               
                    <div class="col-md-4">
                       <label class="red"> *</label>
                       <label for="name"> Name</label>
                       <input class="form-control input-small " id="exam_name" name="exam_name"  aria-label="Small" type="text">
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="class_from">Class From </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <select class="form-control onlyDigit input-sm" id="class_from" name="class_from" >
                            <option value="0"> Select Class</option>
                            @foreach($class as $classes)
                            <option value="{{$classes->id}}"> {{$classes->class_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="red"> *</label>
                        <label for="class_to">Class To </label>                
                        <div class="input-group">
                           <span class="input-group-addon"></span>
                           <select class="form-control onlyDigit input-sm" id="class_to"  name="class_to">
                            <option value="0"> Select Class</option>
                            @foreach($class as $classes)
                            <option value="{{$classes->id}}"> {{$classes->class_name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                       <label for="name">Reporting Time</label>
                       <input type="text" name="reporting_time" class="form-control timepicker">
                    </div>
                    <div class="col-md-6">
                      <label for="name">Examination Time</label>
                       <input type="text" name="examination_time" class="form-control timepicker">
                    </div>
                    <div class="col-md-6">
                      <label for="name">Start Date</label>
                       <input type="text" name="start_date" class="form-control datepicker">
                    </div>
                    <div class="col-md-6">
                      <label for="name">End Date</label>
                       <input type="text" name="end_date" class="form-control datepicker">
                    </div>
                    <div class="col-md-6">
                      <label for="name">Number Of Date</label>
                       <select class="form-control" name="nod" id="nod">
                        @for($i=1;$i<=7;$i++)
                         <option value="{{$i}}">{{$i}}</option> 
                        @endfor                        
                       </select>

                    </div>
                    <div class="col-md-12">
                      <label for="name">Remark</label>
                       <input type="text" name="remark" class="form-control">
                    </div>
                  </div>
                  </div>
                </div>
                <hr>
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
    if (classFrom != 0 && classTo != 0) {
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
 @endsection
