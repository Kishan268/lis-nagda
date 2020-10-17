 @extends('layouts.main')
 @section('content')

<div class="container">
   <div class="col-lg-12">
    @include('admin.notice-circular.header')

    </div>
</div>

<div class="container">
    <div class="row mt-2">
    <div class="col-lg-12">
      <div class="container">
          <div class="app-title">
           @if($message = Session::get('success'))
                  
            <div class="alert alert-success">
              {{ $message }}
            </div>
                @endif
          </div>
      </div>

      <div class="row mt-2">
          <div class="col-lg-12">
            <div class="card mb-4">
              <div class="card-header">
                <div class="panel-heading">
                      <h4 class="panel-title">Notice & Circular</h4>
                  </div>
              </div>
              <div class="card-body">
              <div class="panel panel-default">
                  
                <div class="row">
                    <div class="col-md-3">
                      <label>Select Option</label>
                      <select class="form-control" name="sendtype" id="sendtype">
                        <option value="0">--Select--</option>
                        <option value="1">Send to All</option>
                        <option value="2">Send to Students</option>
                        <option value="6">Send to All Faculty</option>
                      </select>
                      </div>
                             
                    <div class="col-md-3" id="course" style="display: none;">
                        <label>Select Class</label>
                        <select class="form-control" name="course" id="course1" >

                          <option value="">Select Class</option>
                            @foreach($classes as $key=>$class)
                              <option value="{{$class->id}}">{{$class->class_name}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="col-md-3" style="display: none;" id="batch">
                        <label>Select Batch</label>
                        <select class="form-control" name="batch" id="batch1" >
                          <option value="">Select Batch</option>
                          @foreach($batches as $key=>$batch)
                          <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                        @endforeach
                           
                        </select>
                      </div>
                      
             </div>

                <hr><hr>
               <div class="col-md-12" id="all_data" >
                      
                      {{-- Show student Data................. --}}
                </div>
              <hr><hr>
              
           
          </strong>
      </div>
</div>
</div>
</div>
</div>
<script>
  
  $(document).ready(function(){
        $("#course").hide();
        $("#batch").hide();
        $("#dept_id").hide();
        $("#session_id").hide();
        $("#message-block").hide();
        $("#reciver_list").hide();
        $("#course_batches_div").hide();
        $("#course_batches_par_div").hide();

        $('#sendtype').on('change', function(){
        
          var type = $(this).val();
          // alert(type)
          if (type == 0) 
          {
            $("#course").hide();
            $("#batch").hide();
            $("#dept_id").hide();
            $("#session_id").hide();
            $("#course").val(0);
            $("#batch").val(0);
            $("#transStu").hide();
            $("#course_batches_div").hide();
            $("#course_batches_par_div").hide();
          }
           if (type == 1) 
           {
            $("#message-block").show();
            $("#course").hide();
            $("#batch").hide();
            $("#course_batches_div").hide();
            // $("#batch").show();
            // $("#course").show();
            $("#dept_id").hide();
            // $(".notice_circular").hide();
            // $("#student_data").hide();
            $(".notice_circular_for_all").show();
            $("#session_id").hide();
            $("#course").val(0);
            $("#batch").val(0);
            
          //  $("#transStu").hide();
            }
          
          if (type == 2) {
            $("#course").val(0);
            $("#batch").val(0);
            $("#course").show();
            $("#batch").show();
            $("#dept_id").val(0);
            $("#session_id").val(0);
            $("#dept_id").show();
            $("#session_id").show();
             $("#message-block").hide();
             $("#course_batches_div").show();
             // $("#course_batches").show();
             // $(".notice_circular").show();
            $("#course_batches_par_div").hide();
                    //$("#transStu").hide();
                }
          
          if (type == 3) {
            $("#course").hide();
            $("#batch").hide();
            $("#dept_id").hide();
            $("#session_id").hide();
            $("#message-block").hide();
            $("#transStu").hide();
            $("#course_batches_div").hide();
            $("#course_batches_par_div").hide();
              getTeacherList();
          }
          
          if (type == 4) {
            $("#course").val(0);
            $("#batch").val(0);
            $("#course").show();
            $("#batch").show();
            $("#dept_id").val(0);
            $("#session_id").val(0);
            $("#dept_id").show();
            $("#session_id").show();
            $("#message-block").hide();
            $("#transStu").hide();
            $("#course_batches_div").hide();
            $("#course_batches_par_div").show();
          }
          
          if (type == 6) {
            $("#course").hide();
            $("#batch").hide();
            $("#dept_id").hide();
            $("#session_id").hide();
            $("#message-block").hide();
            $("#course_batches_div").hide();
            $("#course_batches_par_div").hide();
            $(".notice_circular_for_all_faculties").show();
            // getTeacherList();
            
            // $("#sendtype").on('change', function(){
              // alert();
                var val = $(this).val()
                var getSendAllData = 'send_to_faculty';
                if(val==6){
                  $.ajax({
                    type: "POST",
                    url: "{{route('get_send_to_faculty_data')}}",
                    data: {val:val,getSendAllData:getSendAllData,"_token": "{{ csrf_token() }}"},
                    success: function(data){
                        $('#all_data').html(data)
                        $(".notice_circular").show();
                          
                    }
                })
                }
            // });
        }
        });

        $("#sendtype").on('change', function(){
            var val = $(this).val()
            var getSendAllData = 'send_to_all';
            if(val==1){
              $.ajax({
                type: "POST",
                url: "{{route('get_send_to_all_data')}}",
                data: {val:val,getSendAllData:getSendAllData,"_token": "{{ csrf_token() }}"},
                success: function(data){
                    $('#all_data').html(data)
                    $(".notice_circular").show();
                      
                }
            })
            }
        }); 


        $("#batch").on('change', function(){
            var getSendAllData = 'send_to_all';
            var courseId = $('#course1').val();
            var batchId = $('#batch1').val();
            var getSendAllData = 'send_to_student';
            // if(val==2){
              $.ajax({
                type: "POST",
                url: "{{route('get_send_to_student_data')}}",
                data: {courseId:courseId,batchId:batchId,getSendAllData:getSendAllData,"_token": "{{ csrf_token() }}"},
                success: function(data){
                    $('#all_data').html(data)
                    $(".notice_circular").show();
                      
                }
            })
            // }
        });

    });
</script>
 @endsection('content')
