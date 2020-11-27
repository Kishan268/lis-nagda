@extends('layouts.main')
 @section('content')
<div id="content">
  <div class="container">
   <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
        <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Certificate Request<h4 class="panel-title">  <a href="{{route('certificate-request.create')}}" class="btn btn-success pull-right btn-sm fa fa-send">send request</a></h4></h6>
      </div>
      <div class="app-title full-right">
       @if($message = Session::get('success'))   
          <div class="alert alert-success">{{ $message }}</div>
       @endif
      <!-- Card Body -->
      <div class="card-body">
        {{-- {{dd($examTimeTableMast)}} --}}
        <table class="table table-striped table-bordered">
           <thead>
              <tr>
                <th>#</th>
                <th>Certificate Type</th>
                <th>Apply Date</th>
                <th>Reason</th>
                <th>Response</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php $count = 1; ?>
                @foreach($certifReq as $certifReqs)
                 <td>{{$count++}}</td>
                  <td>{{$certifReqs->cert_type}}</td>
                  <td>{{date('Y-m-d',strtotime($certifReqs->created_at))}}</td>
                  <td>{{$certifReqs->reason}}</td>
                  <td><a href="" class="fa fa-eye"></a></td>
              </tr>
              @endforeach
            </tbody>
        </table> 
    </div>
  </div>
</div>

@endsection