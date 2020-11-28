@extends('layouts.main')
 @section('content')
  <div class="container">
   <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Certificate Request<h4 class="panel-title">  </h4></h6>
      </div>
      <div class="app-title full-right">
       @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
       @endif
      <!-- Card Body -->
      <div class="card-body">
        {{-- {{dd($examTimeTableMast)}} --}}
        <table class="table table-striped table-bordered mytable">
           <thead>
              <tr>
                <th>#</th>
                <th>Certificate Type</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Apply Date</th>
                <th>View </th>
                <th>Request</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php $count = 1; ?>
                @foreach($certifReq as $certifReqs)
                 <td>{{$count++}}</td>
                  <td>{{$certifReqs->cert_type}}</td>
                  <td>{{$certifReqs->studentInfo->f_name}} {{$certifReqs->studentInfo->l_name}}</td>
                  <td>{{$certifReqs->studentInfo->student_class->class_name}}</td>
                  <td>{{date('Y-m-d',strtotime($certifReqs->created_at))}}</td>
                  <td><a href="{{route('certificates.show',$certifReqs->cert_req_id)}}"><i class="fa fa-eye"></i></a></td>
                  <td>
                    @if($certifReqs->status==1)
                     <a class="btn btn-success" id="approve" href="{{route('certificate_approve',$certifReqs->cert_req_id)}}" >Go To Approve </a>|| <button class="btn btn-danger decline_request1" id="{{$certifReqs->cert_req_id}}" data-cert-id="{{$certifReqs->cert_req_id}}" data-stud-id="{{$certifReqs->studentInfo->id}}" data-toggle="modal" data-target="#exampleModal{{$certifReqs->cert_req_id}}">Decline </button>
                    @else
                      Approved
                    @endif
                   </td>
              </tr>

              @endforeach
            </tbody>
        </table> 
    </div>
  </div>
   <!-- Modal -->
  <div class="modal fade decline_request1" id="decline_request" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Declin Reason</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       
          <div class="modal-body">
            <form method="post" action="{{route('req_declice_reason')}}">
              @csrf
            <label for="decline_reason">Enter Reason</label>
            <input type="text" name="decline_reason" class="form-control" id="cert_decline_reason">
            <input type="hidden" name="cert_id" class="form-control" id="cert_id" value="">
            <input type="hidden" name="stud_id" class="form-control" id="stud_id" value="">
          </div>
        <div class="modal-footer">
          <button  class="btn btn-primary btn-sm" type="submit" id="btnSubmit">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script >
$(document).ready(function(){

    $('.decline_request1').on('click',function(){
        $('#cert_id').val($(this).data('cert-id'));
        $('#stud_id').val($(this).data('stud-id'));
        $('#decline_request').modal('show');
    });

    @if($message = Session::get('success'))
        alert("{{$message}}")
    @endif


    @if($errors->any())
         $('#decline_request').modal('show');     
    @endif

$('#btnSubmit').on('click',function(){

      var decline_reason = $('#cert_decline_reason').val();
      var cert_id = $('#cert_id').val();
      var stud_id = $('#stud_id').val();
      // if(decline_reason !='' && cert_id !='' stud_id !=''){

         $.ajax({
             type:'POST',
             url: "{{route('req_declice_reason')}}",
             data:{
                decline_reason:decline_reason,
                cert_id:cert_id,
                stud_id:stud_id, 
                "_token": "{{ csrf_token() }}"
              },
               success:function(res){
                if (res == 'success') {
                $('#decline_request').empty();
                // $('#decline_reason').reset();
                $('#decline_request').modal('hide');
                 location.reload(); 
              }
             }
           });

      // }else{
      //   alert('not valid request')
      // }

    });

});

</script>
@endsection