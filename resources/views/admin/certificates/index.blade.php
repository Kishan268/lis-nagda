@extends('layouts.main')
 @section('content')
<div id="content">
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
                    <form action="{{'certificate_approve'}}" method="post">
                      
                    </form>
                    <a class="btn btn-success" id="approve" href="{{route('certificate_approve',$certifReqs->cert_req_id)}}" >Go To Approve </a>|| <button class="btn btn-danger">Reject </button></td>
              </tr>
              @endforeach
            </tbody>
        </table> 
    </div>
  </div>
</div>

@endsection