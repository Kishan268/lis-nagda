@extends('layouts.main')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        @include('admin.students.header')
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card">
          <div class="card-header">
              <h4 class="card-title">Student Dashboard</h4>
          </div>
          <div  class="card-body">
              <div class="row">
                  <div class="col-xl-3 col-md-3 col-sm-12 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Todal Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">40,000</div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection