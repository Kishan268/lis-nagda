 @extends('layouts.main')
 @section('content')
@include('admin.notice-circular.header')
<style type="text/css">
  #course_batches_div {
    float: right;
    margin-top: -38px;
}
</style>

  <div class="app-title">
   @if($message = Session::get('success'))   
    <div class="alert alert-success">
     {{ $message }}
    </div>
        @endif
  </div>
</div>
<div class="container">
      
  <div class="card-header">
    <div class="panel-heading">
          <h4 class="panel-title">Add Notice & Circular</h4>
      </div>
  </div>
  <div class="card-body">
    <form method="post" id="FrmImgUpload" action="javascript:void(0)" enctype="multipart/form-data">
    <div class="panel panel-default">
      <div class="row">
        <div class="col-lg-12">
           {{--  <form action="{{route('notice-circular.store')}}" id="validate-form" method="post" enctype="multipart/form-data"> --}}
              @csrf 
              <div class="widget">
                  <div class="col-md-3">
                      <label for="details">Select options</label>
                      <select class="form-control" name="sendtype" id="sendtype">
                        <option value="0">--Select--</option>
                        <option value="1">Send to All</option>
                        <option value="2">Send to Classes</option>
                        <option value="3">Send to All Faculty And Teacher</option>
                      </select>
                  </div>
                <div class="col-md-6" id="course_batches_div" >
                    <div class="chosen"  >
                        <label for="details">Classes</label>
                    </div>
                    <div>
                       <select class="form-control select-chosen" multiple="multiple" id="myid" name="course_batches[]" >
                       </select>
                    </div>
                    <input type="hidden" name="batch_id" value="{{session('current_batch')}}">
               </div>
             </div>
          </div>
      </div>
      <hr>
     {{-- <div class="col-md-12" id="student_data" >
     </div> --}}
    <div class="col-md-12 notice_circular" id="faculty_data" >
         {{-- Show student Data................. --}}
    </div>
        <div class="container notice_circular" style="display: none;">
              <div class="row">

                  <div class="col-md-4">
                        <label for="circularname">Title</label>
                      <input class="form-control " id="circulartitle2" name="circular_title" type="text" required>

                      @error('circular_title')
                        <span class="text-danger">
                          <strong>{{$message}}</strong>
                        </span>
                      @enderror
                  </div>

                  <div class="col-md-4">
                      <label for="diaplaydate">Date From be displayed</label>
                      <div class="">
                          <input type="text" id="displayfromdate2" name="date_from_display" autocomplete="off" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="YYYY-mm-dd"data-date-start-date="0d" required>
                          @error('date_from_display')
                            <span class="text-danger">
                              <strong>{{$message}}</strong>
                            </span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-4">
                      <label for="diaplaydate">Date to be displayed</label>
                      <div class="">
                          <input type="text" autocomplete="off" id="displaydate2" name="date_to_display" class="form-control datepicker" data-date-format="yyyy-mm-dd" placeholder="YYYY-mm-dd"  required>
                          @error('date_to_display')
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
                      <textarea class="form-control" name="circular_description" id="circulardescription2" rows="4" type="text" required></textarea>
                      @error('circular_description')
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
                  <input class="btn btn-primary" type="submit" value="Add Circular" id="sendToAllFacultysad">
                 
              </div>
           </div>
         <div class="’widget-container" fluid-height="" clearfix’="" style="margin-top: 50px;">
              <div class="widget-content  padded  row" id="reciver_list" style="display: none;"></div>
         </div>
          </strong>
      </div>
    </form> 
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
                circular_title: {
                    required: true,
                },
                date_from_display: {
                    required: true,
                },
                date_to_display: {
                    required: true,
                },
                circular_description: {
                    required: true,
                },
                file: {
                    required: true,
                }
            },
           
        });
    });
</script>

{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}

<script type="text/javascript">

$(document).ready(function(){
    $("#course_batches_div").hide();
    $("#faculty_data").hide();
    // $("#batch").hide();
    // $("#dept_id").hide();
    // $("#session_id").hide();
    // $("#message-block").hide();
    // $("#reciver_list").hide();
    // $("#course_batches_div").hide();
    // $("#course_batches_par_div").hide();

    $('#sendtype').on('change', function(){
      var type = $(this).val();
      
       if (type == 0) 
       {
        $(".notice_circular").hide();
        $(".container notice_circular").show();
        $("#course_batches_div").hide();
        $("#faculty_data").hide();

        }
      if (type == 1) 
       {
        $(".notice_circular").show();
        $("#course_batches_div").hide();
        $("#faculty_data").hide();

        }
      
      if (type == 2) {
        $(".notice_circular").show();
        $("#faculty_data").show();
          $.ajax({
              type: "GET",
              url: "{{route('get_all_classes')}}",
              data: {"_token": "{{ csrf_token() }}"},
              success: function(data){
                  $("#course_batches_div").show();
                  $(".select-chosen").show();
                  $(".select-chosen").empty();
                  $.each(data,function(key,value){

                  $(".select-chosen").append('<option value="'+value.id+'">'+value.class_name+'</option>');

                   });
              }
          })
      }
    if (type == 3) {
        $("#course_batches_div").hide();
        var val ='send_to_faculty';
          $.ajax({
            type: "POST",
            url: "{{route('get_faculty_data')}}",
            data: {val:val,"_token": "{{ csrf_token() }}"},
            success: function(data){
            $('#faculty_data').html(data)
            $(".notice_circular").show();
                  
            }
        })
    }
    });
   


  $('#FrmImgUpload').on('submit',(function(e) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      e.preventDefault();
      var formData = new FormData(this);
      // var formData = $('#FrmImgUpload').serialize();
        $.ajax({
           type:'POST',
           url: "{{route('notice-circular.store')}}",
           data:formData,
           cache:false,
           contentType: false,
           processData: false,
           success:function(data){
              $.notify("Notice added Succesfully",'success');
               setTimeout(function () {
                    location.reload(true);
                  }, 2000);
           }, 
        });
       
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
