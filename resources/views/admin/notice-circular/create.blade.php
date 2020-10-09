 @extends('layouts.main')
 @section('content')
<style type="text/css">
  #course_batches_div {
    float: right;
    margin-top: -38px;
}
</style>
<div class="container">
   <div class="col-lg-12">
    @include('admin.notice-circular.header')

    </div>
</div>
    <div class="app-title">
     @if($message = Session::get('success'))
            
      <div class="alert alert-success">
       {{ $message }}
      </div>
          @endif
    </div>
</div>
<div class="container">
      <div class="row mt-2">
          <div class="col-lg-12">
            <div class="card mb-4">
              <div class="card-header">
                <div class="panel-heading">
                      <h4 class="panel-title">Add Notice & Circular</h4>
                  </div>
              </div>
              <div class="card-body">
              <div class="panel panel-default">
                <div class="row">
                  <div class="col-lg-12">
                   {{--  <form action="{{route('notice-circular.store')}}" id="validate-form" method="post" enctype="multipart/form-data">
                      @csrf --}} 
                      <div class="widget-container fluid-height">
                          <div class="col-md-3">
                              <select class="form-control" name="sendtype" id="sendtype">
                                  <option value="0">Select Send to</option>
                                  <option value="1">Send to All</option>
                                  <option value="2">Send to Students</option>
                                  {{-- <option value="4">Send to Parents</option> --}}
                                  <option value="6">Send to All Faculty</option>
                              </select>
                          </div>

                        <div class="col-md-6" id="course_batches_div" >
                            
                            <div class="chosen-container"  >
                             
                                <label for="details">Course - Batch - Section</label>
                                  {{-- <input type="text" value="Select Some Options" class=" form-control default" autocomplete="off"> --}}
                                
                            </div>
                            <div>
                                 <select class="form-control select-chosen" multiple="multiple" id="myid" name="course_batches[]" >

                                 </select>
                            </div>
                            <div class="chosen-drop">
                                <ul class="chosen-results"></ul>
                            </div>
                       </div>



                     </div>
                  </div>
              </div>
              <hr><hr>
               <div class="col-md-12" id="student_data" >
                      
                      {{-- Show student Data................. --}}
                </div>

                 <div class="col-md-12" id="faculty_data" >
                      
                      {{-- Show student Data................. --}}
                </div>
              <hr><hr>

                  <div class="container notice_circular" style="display: none;">
                    <h3>Send to students</h3>

                    <div class="row">
                      <input type="hidden" name="sender" value="send_to_student" id="sender_type">
                        <div class="col-md-4">
                              <label for="circularname">Title</label>
                            <input class="form-control " id="circulartitle" name="circulartitle" type="text" required>

                            @error('circulartitle')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="diaplaydate">Date From be displayed</label>
                            <div class="">
                                <input type="text" id="displayfromdate" name="displayfromdate" autocomplete="off" class="form-control input-datepicker datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" data-date-start-date="0d" required>
                                @error('displayfromdate')
                                  <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="diaplaydate">Date to be displayed</label>
                            <div class="">
                                <input type="text" autocomplete="off" id="displaydate" name="displaydate" class="form-control input-datepicker datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" data-date-start-date="0d" required>
                                @error('displaydate')
                                  <span class="text-danger">
                                    <strong>{{$message}}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="file">Filename:</label>
                            <input type="file" name="file" id="file">
                        </div>
                    
                        <div class="col-md-12">
                            <label for="circulardescription">Description</label>
                            <textarea class="form-control" name="circulardescription" id="circulardescription" rows="4" type="text" required></textarea>
                            @error('circulardescription')
                              <span class="text-danger">
                                <strong>{{$message}}</strong>
                              </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                    </div>
                    <div class="pull-right mb-2">
                        <input class="btn btn-primary" type="submit" value="Add Circular" id="submitData">
                        <input class="btn btn-back" onclick="javascript: window.location.replace('index.php?plugin=circularv2&amp;action=index&amp;circular_id=&amp;circular_description=');" type="button" value="Cancel">
                    </div>
                  </div>
                {{-- </form> --}}
                </div>
          </div>


           <div class="container notice_circular_for_all" style="display: none;">
            <h3>Send to All</h3>
              <div class="row">
                <input type="hidden" name="sender" value="send_to_all" id="sender_type1">
                  <div class="col-md-4">
                        <label for="circularname">Title</label>
                      <input class="form-control " id="circulartitle1" name="circulartitle" type="text" required>

                      @error('circulartitle')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="col-md-4">
                      <label for="diaplaydate">Date From be displayed</label>
                      <div class="">
                          <input type="text" id="displayfromdate1" name="displayfromdate" autocomplete="off" class="form-control input-datepicker datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" data-date-start-date="0d" required>
                          @error('displayfromdate')
                            <span class="text-danger">
                              <strong>{{$message}}</strong>
                            </span>
                          @enderror
                      </div>
                  </div>
                  
                  <div class="col-md-4">
                      <label for="diaplaydate">Date to be displayed</label>
                      <div class="">
                          <input type="text" autocomplete="off" id="displaydate1" name="displaydate" class="form-control input-datepicker datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" data-date-start-date="0d" required>
                          @error('displaydate')
                            <span class="text-danger">
                              <strong>{{$message}}</strong>
                            </span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-4">
                      <label for="file">Filename:</label>
                      <input type="file" name="file" id="file1">
                  </div>
              
                  <div class="col-md-12">
                      <label for="circulardescription">Description</label>
                      <textarea class="form-control" name="circulardescription" id="circulardescription1" rows="4" type="text" required></textarea>
                      @error('circulardescription')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      &nbsp;
                  </div>
              </div>
              <div class="pull-right mb-2">
                  <input class="btn btn-primary" type="submit" value="Add Circular" id="sendToAll">
                  <input class="btn btn-back" onclick="javascript: window.location.replace('index.php?plugin=circularv2&amp;action=index&amp;circular_id=&amp;circular_description=');" type="button" value="Cancel">
              </div>
           </div>


           <div class="container notice_circular_for_all_faculties" style="display: none;">
            <h3>Send to all faculties</h3>
              <div class="row">

                <input type="hidden" name="sender" value="send_to_all_faculties" id="sender_type2">
                  <div class="col-md-4">
                        <label for="circularname">Title</label>
                      <input class="form-control " id="circulartitle2" name="circulartitle" type="text" required>

                      @error('circulartitle')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="col-md-4">
                      <label for="diaplaydate">Date From be displayed</label>
                      <div class="">
                          <input type="text" id="displayfromdate2" name="displayfromdate" autocomplete="off" class="form-control input-datepicker datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" data-date-start-date="0d" required>
                          @error('displayfromdate')
                            <span class="text-danger">
                              <strong>{{$message}}</strong>
                            </span>
                          @enderror
                      </div>
                  </div>
                  
                  <div class="col-md-4">
                      <label for="diaplaydate">Date to be displayed</label>
                      <div class="">
                          <input type="text" autocomplete="off" id="displaydate2" name="displaydate" class="form-control input-datepicker datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" data-date-start-date="0d" required>
                          @error('displaydate')
                            <span class="text-danger">
                              <strong>{{$message}}</strong>
                            </span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-4">
                      <label for="file">Filename:</label>
                      <input type="file" name="file" id="file2">
                  </div>
              
                  <div class="col-md-12">
                      <label for="circulardescription">Description</label>
                      <textarea class="form-control" name="circulardescription" id="circulardescription2" rows="4" type="text" required></textarea>
                      @error('circulardescription')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      &nbsp;
                  </div>
              </div>
              <div class="pull-right mb-2">
                  <input class="btn btn-primary" type="submit" value="Add Circular" id="sendToAllFaculty">
                  <input class="btn btn-back" onclick="javascript: window.location.replace('index.php?plugin=circularv2&amp;action=index&amp;circular_id=&amp;circular_description=');" type="button" value="Cancel">
              </div>
           </div>
         <div class="’widget-container" fluid-height="" clearfix’="" style="margin-top: 50px;">
              <div class="widget-content  padded  row" id="reciver_list" style="display: none;"></div>
         </div>
              
           
          </strong>
      </div>
    </div>
  </div>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
        
<script type="text/javascript">



$(function () {
  $(".datepicker").datepicker({ 
    singleDatePicker: true,
    showDropdowns: true,
  });
});

$('label,required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');
$('th.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

    $(function(){
        $('#validate-form').validate({
            rules: {
                circulartitle: {
                    required: true,
                },
                displayfromdate: {
                    required: true,
                },
                circulardescription: {
                    required: true,
                },
                displaydate: {
                    required: true,
                }
            },
            messages: {},
            focusCleanup: true
        });
    });
</script>

{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}

<script type="text/javascript">

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
        $("#course_batches_div").hide();
        $("#batch").hide();
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
        // $(".notice_circular_for_all_faculties").show();
        // getTeacherList();
        var val ='send_to_faculty';
          $.ajax({
            type: "POST",
            url: "{{route('get_faculty_data')}}",
            data: {val:val,"_token": "{{ csrf_token() }}"},
            success: function(data){
            $('#faculty_data').html(data)
            $(".notice_circular_for_all_faculties").show();
                  
            }
        })
    }
    });
 

        $("#course_batches_chosen,#myid").on('click blur', function(){
            var val = $('#myid').select2()
            $.ajax({
                type: "GET",
                url: "{{route('course_batches_chosen')}}",
                data: {"_token": "{{ csrf_token() }}"},
                success: function(data){
                    $("#course_batches_div").show();
                    $(".select-chosen").show();
                    $(".select-chosen").empty();
                      $.each(data,function(key,value){

                      $(".select-chosen").append('<option value="'+value.id+'">'+value.class_name.class_name+'--' +value.batch_name.batch_name+'--' +value.section_names.section_name+'</option>');

                       });

                }
            })
        }); 

          $("#myid").on('change', function(){
            var val = $('#myid').val()
            
              $.ajax({
                type: "POST",
                url: "{{route('get_s_data')}}",
                data: {val:val,"_token": "{{ csrf_token() }}"},
                success: function(data){
                    $('#student_data').html(data)
                    $(".notice_circular").show();
                      
                }
            })
        });

   

        $(document).on('click','#submitData',function(e){
            e.preventDefault();

            courseBatchSectionId = $('#myid').val();
            // var k = 0;
            //  $('#myid').each(function() {
            //   courseBatchSectionId[k++] = $(this).val();
            // });
             // alert(courseBatchSectionId);
            var CourseBatchSectionId = $('#myid').val();
            var selected_student = [];
            var i = 0;
            $('input[name="s_id[]"]:checked').each(function() {
              selected_student[i++] = $(this).val();
            });
            var j =0;
            var total_student = [];
            $('input[name="s_id[]"]').each(function() {
              total_student[j++] = $(this).val();
            });
            var sendertype = $('#sender_type').val();
            var length = total_student.length;
            var circular_title = $('#circulartitle').val();
            var date_from_display = $('#displayfromdate').val();
            var date_to_display = $('#displaydate').val();
            var file = $('#file').val();
            var circular_description = $('#circulardescription').val();

          if(selected_student !='' && circular_title !='' && date_from_display !='' &&date_to_display !='' && circular_description !=''){
            $.ajax({
                type:'post',
                url:'{{route('notice-circular.store')}}',

                data:{selected_student:selected_student,sendertype:sendertype,total_student:length,circular_title:circular_title,date_from_display:date_from_display,date_to_display:date_to_display,file:file,circular_description:circular_description,courseBatchSectionId:courseBatchSectionId, "_token": "{{ csrf_token() }}"},
                success:function(res){
                  console.log(res)
                  if(res == 'success'){
                    $.notify("Students notice and circular successfully submitted",'success');
                     setTimeout(function () {
                      location.reload(true);
                    }, 3000);
                  }else if(res =='warning'){
                    $.notify("Student notice and circular already submitted");
                  }
                }
            });
            }else{

           $.notify("All checkbox and * field are mandatory.");
      }
      }); 


    $(document).on('click','#sendToAll',function(e){
      e.preventDefault();
      
      var sendertype = $('#sender_type1').val();
      var circular_title = $('#circulartitle1').val();
      var date_from_display = $('#displayfromdate1').val();
      var date_to_display = $('#displaydate1').val();
      var file = $('#file1').val();
      var circular_description = $('#circulardescription1').val();
      // alert(sendertype)
       if( circular_title !='' && date_from_display !='' && date_to_display !='' && circular_description !='' && sendertype !=''){
        $.ajax({
            type:'post',
            url:'{{route('notice-circular.store')}}',

            data:{sendertype:sendertype,circular_title:circular_title,date_from_display:date_from_display,date_to_display:date_to_display,file:file,circular_description:circular_description, "_token": "{{ csrf_token() }}"},
            success:function(res){
              console.log(res)
              if(res == 'success'){
                $.notify("All Students notice and circular successfully submitted",'success');
                  setTimeout(function () {
                    location.reload(true);
                  }, 3000);
              }else if(res =='warning'){
                $.notify("All Student notice and circular already submitted");
              }
            }
        });
        }else{

       $.notify("All * field are mandatory.");
      }
      });

    $(document).on('click','#sendToAllFaculty',function(e){
      e.preventDefault();

      var selected_faculty = [];
      var i = 0;
      $('input[name="faculty_id[]"]:checked').each(function() {
        selected_faculty[i++] = $(this).val();
      });
      var j =0;
      var total_faculty = [];
      $('input[name="faculty_id[]"]').each(function() {
        total_faculty[j++] = $(this).val();
      });

      var sendertype = $('#sender_type2').val();
      var circular_title = $('#circulartitle2').val();
      var date_from_display = $('#displayfromdate2').val();
      var date_to_display = $('#displaydate2').val();
      var file = $('#file2').val();
      var circular_description = $('#circulardescription2').val();
      // alert(sendertype)
       if( circular_title !='' && date_from_display !='' && date_to_display !='' && circular_description !='' && sendertype !=''){
        $.ajax({
            type:'post',
            url:'{{route('notice-circular.store')}}',

            data:{sendertype:sendertype,selected_faculty:total_faculty,total_faculty:sendertype,circular_title:circular_title,date_from_display:date_from_display,date_to_display:date_to_display,file:file,circular_description:circular_description, "_token": "{{ csrf_token() }}"},
            success:function(res){
              console.log(res)
              if(res == 'success'){
                $.notify("All Faculties notice and circular successfully submitted",'success');
                setTimeout(function () {
                  location.reload(true);
                }, 3000);
              }else if(res =='warning'){
                $.notify("All Faculties notice and circular already submitted");
              }
            }
        });
        }else{

       $.notify("All * field are mandatory.");
      }
      });

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
