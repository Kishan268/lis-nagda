@extends('layouts.main')
 @section('content')
<div id="content">

<div class="container">
       <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
            <h6 style="font-size: 15px;" class="m-0 font-weight-bold text-primary">Time Table<h4 class="panel-title">  <a href="{{route('time-table.create')}}" class="btn btn-success pull-right btn-sm">Add Time Table</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right btn-sm">Back</a></h4></h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <table class="table table-striped table-bordered mytable">
              
              
            </table> 
        </div>
      </div>
    </div>
</div>



 @endsection