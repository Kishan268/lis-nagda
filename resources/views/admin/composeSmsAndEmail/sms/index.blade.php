 @extends('layouts.main')
 @section('content') 
 <meta name="csrf-token" content="{{ csrf_token() }}" /> 
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
                      <h4 class="panel-title"> SMS Compose 
                         <a href="{{route('send_sms_delivery_report')}}"><button class="btn btn-success" style="float:right;">SMS Delivery Report</button></a>
                      </h4>
                     
                  </div>
                       
                          
              </div>
              <div class="card-body">
              <div class="panel panel-default">
              <form method="post" id="FrmImgUpload" action="javascript:void(0)" enctype="multipart/form-data">
               @csrf
                <div class="row">
                    <div class="col-md-3">
                      <label>Select Option</label>
                      <select class="form-control" name="sendtype" id="sendtype">
                        <option value="0">--Select--</option>
                        <option value="1">Send to All</option>
                        <option value="2">Send to Students</option>
                        <option value="3">Send to All Faculty</option>
                      </select>
                      </div>
                      <div class="col-md-9" id="class_batch_section" style="display: none;">
                        <div class="row">
                          <div class="col-md-4">
                          <label>Select Batch</label>
                            <select class="form-control" name="batch_id">
                              <option value="">Select Batch</option>
                              @foreach($batches as $key=>$batch)
                              <option value="{{$batch->id}}">{{$batch->batch_name}}</option>
                            @endforeach
                               
                            </select>
                          </div>

                          <div class="col-md-3">
                          <label>Select Class</label>
                            <select class="form-control" name="std_class_id"> 
                              <option value="">Select Class</option>
                                @foreach($classes as $key=>$class)
                                  <option value="{{$class->id}}">{{$class->class_name}}</option>
                                @endforeach
                              </select>

                            </select>
                          </div>

                          <div class="col-md-3">
                          <label>Select Section</label>
                            <select class="form-control" name="section_id" id="section_id"> 
                              <option value="">Select Section</option>
                              @foreach($sections as $key=>$section)
                                <option value="{{$section->id}}">{{$section->section_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                <hr>
                </div>
                 <div class="container mt-3" id="students_data">
                   <div class="row">
                     <div class="col-md-12"></div>
                   </div>
                 </div>
                 <div class="container mt-3" id="faculty_data">
                   <div class="row">
                     <div class="col-md-12"></div>
                   </div>
                 </div> 

               <div class="container editor_show" style="display: none;">
                <hr>
                 <div class="row mt-3">
                  <div class="col-md-12">
                    
                    <div class="col-md-12 mt-3">
                      <label> Compose SMS </label> <span class="required">*</span>
                      <textarea class="form-control" id="compose_sms_content" name="compose_sms_content" spellcheck="false" required=""></textarea>
                    </div>
                <hr><hr>
               <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-sm btn-success " id="btnSubmit" align-center>Send</button>
                </div>
              </div>
               </div>
               <div class="col-md-12" id="all_data" >
                  {{-- Show student Data................. --}}
                </div>
              <hr>
          </strong>
      </div>
    </form>
</div>
</div>
</div>
</div>


<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>

  // CKEDITOR.replace('compose_mail_content')

  $(document).ready(function(){

        $("#course").hide();
        $("#batch").hide();
        $(".editor_show").hide();
        $("#course_batches_section").hide();
        $('.required').css('color', 'red');

        $('#sendtype').on('change', function(){
          var type = $(this).val();
          // alert(type)
          if (type == 0) 
          {
            $("#course").hide();
            $("#batch").hide();
            $("#dept_id").hide();
            $("#course_batches_section").hide();
            $(".editor_show").hide();
            $("#class_batch_section").hide();
            $("#students_data").hide();
            $("#faculty_data").hide();

          }
           if (type == 1) 
           {
            $("#message-block").show();
            $("#course").hide();
            $("#batch").hide();
            $(".notice_circular_for_all").show();
            $(".editor_show").show();
            $("#course_batches_section").hide();
            $("#class_batch_section").hide();
            $("#students_data").hide();
            $("#faculty_data").hide();

            
          //  $("#transStu").hide();
            }
          
          if (type == 2) {
            $("#course").show();
            $("#batch").show();
            $("#course_batches_section").show();
            $("#class_batch_section").show();
            $("#students_data").show();
            $("#course_batches_par_div").hide();
            $(".editor_show").hide();
            $("#faculty_data").hide();

          }
          
          if (type == 3) {
            $("#course").hide();
            $("#batch").hide();
            $(".notice_circular_for_all_faculties").show();
            $(".editor_show").show();
            $("#course_batches_section").hide();
            $("#class_batch_section").hide();
            $("#students_data").hide();
            $("#faculty_data").show();
            var type = 'faculty';
            $.ajax({
              type:'POST',
              url: "{{route('get_students_for_sms_compose')}}",
              data: {type:type,"_token": "{{ csrf_token() }}",},
              success:function(res){

                $('#faculty_data').empty().html(res);
                $(".editor_show").show();

              }
            });
        }
        });

        $("#section_id").on('change', function(){
              var val = $(this).val()
              // if(val==2){
              var batch_id = $('select[name="batch_id"] option:selected').val();
              var std_class_id = $('select[name="std_class_id"] option:selected').val();
              var section_id = $('select[name="section_id"] option:selected').val();
              var type = 'student';
               if(section_id !=''  && batch_id !='' && std_class_id != '' ){
                $.ajax({
                  type:'POST',

                  url: "{{route('get_students_for_sms_compose')}}",
                  data: {batch_id:batch_id,std_class_id: std_class_id, section_id:section_id,type:type, "_token": "{{ csrf_token() }}",},
                  success:function(res){

                    $('#students_data').empty().html(res);
                    $(".editor_show").show();
                    $("#compose_sms_content").show();

                  }
                });
              }else{
                $.notify("please select all field");

              }

            // }
        }); 
       
      $('#FrmImgUpload').on('submit',(function(e) {
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          e.preventDefault();

          var formData = new FormData(this);
          var compose_sms_content = $('#compose_sms_content').val();
          if(compose_sms_content != ''){
            $.ajax({
               type:'POST',
               url: "{{route('send_sms')}}",
               data:formData,
               cache:false,
               contentType: false,
               processData: false,
               success:function(data){
                  $.notify("Message send Succesfully",'success');
                  alert('Message send Succesfully');
                   // setTimeout(function () {
                   //      location.reload(true);
                   //    }, 3000);
               }, 
        });
       }else{
          $.notify("Please select all * fields");

       } 
    }));
   $(document).on('click','.selectAll' ,function(){  
       if ($(this).is( ":checked" )) {
        $('body .check').prop('checked',true);

       }else{
        $('body .check').prop('checked',false);
       }
    }); 

  });
</script>
 @endsection('content')
