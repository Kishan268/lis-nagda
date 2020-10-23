<style>
	.bg-color:hover {
	  background-color: #4e73df;
	  color:white;
	}
	
</style>

     <div class="card shadow mb-4">
	        <!-- Card Header - Dropdown -->
	        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	          <h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
	        </div>
	        <!-- Card Body -->
	        <div class="card-body">
	          <div class="row">
		        <!-- Earnings (Monthly) Card Example -->
		        <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
		         <a href="{{route('mystudent')}}" class="">
		          <div class="card border-left-primary shadow h-100 py-2 bg-color">
		            <div class="{{ Request::url() == route('mystudent') ? 'card-body btn-primary' : '' }}">
		              <div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                  <div class="text-xs font-weight-bold text text-uppercase mb-1">Dashboard</div>
		                  {{-- <div class="h5 mb-0 font-weight-bold text-gray-800"></div> --}}
		                </div>
		                <div class="col-auto">
		                  <i class="fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
		                </div>
		              </div>
		            </div>
		          </div>
		            </a>
		        </div>

		        <!-- Earnings (Monthly) Card Example -->
		        <div class="col-md-2 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li ">
		        <a href="{{url('student_detail')}}">
		          <div class="card border-left-success shadow h-100 py-2 bg-color">
		            
			            <div class="{{ Request::url('student_detail') == url('student_detail') ? 'card-body btn-primary' : '' }}">
			              	<div class="row no-gutters align-items-center">
			                <div class="col mr-2">
			                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Student Details</div>
			                  {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div> --}}
			                </div>
			                <div class="col-auto">
			                  <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
			                </div>
			              </div>
			            </div>
		          </div>
		          </a>
		        </div>

		        <!-- Earnings (Monthly) Card Example -->
		        <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
		        <a href="{{route('student_manage')}}">
		          <div class="card border-left-info shadow h-100 py-2 bg-color ">
		            <div class="{{ Request::url() == route('student_manage') ? 'card-body btn-primary' : '' }} ">
		              <div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Manage Students</div>
		                  <div class="row no-gutters align-items-center">
		                    
		                  </div>
		                </div>
		                <div class="col-auto">
		                  <i class="fa fa-gear fa-2x text-gray-300"></i>
		                </div>
		              </div>
		            </div>
		          </div>
		      </a>
		        </div>
		        <!-- Earnings (Monthly) Card Example -->
		        <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
		        <a href="{{route('previous-record')}}">
		          <div class="card border-left-info shadow h-100 py-2 bg-color">
		            <div class="{{ Request::url() == route('previous-record') ? 'card-body btn-primary' : '' }}">
		              <div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Prevous Record</div>
		                  <div class="row no-gutters align-items-center">
		                    
		                  </div>
		                </div>
		                <div class="col-auto">
		                  <i class="fa fa-gear fa-2x text-gray-300"></i>
		                </div>
		              </div>
		            </div>
		          </div>
		      </a>
		        </div>

		          <!-- Pending Requests Card Example -->
		          <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
		          	<a href="{{route('student_import_export')}}">
		            <div class="card border-left-warning shadow h-100 py-2 bg-color">
		              <div class="{{ Request::url() == route('student_import_export') ? 'card-body btn-primary' : '' }}">
		                <div class="row no-gutters align-items-center">
		                  <div class="col mr-2">
		                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Upload Students</div>
		                    {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">18</div> --}}
		                  </div>
		                  <div class="col-auto">
		                    <i class="fa fa-upload fa-2x text-gray-300"></i>
		                  </div>
		                </div>
		              </div>
		            </div>
		        </a>
		          </div>
		           <!-- Pending Requests Card Example -->
		          <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
		          	<a href="{{route('home')}}">
		            <div class="card border-left-warning shadow h-100 py-2 bg-color">
		              <div class="card-body">
		                <div class="row no-gutters align-items-center">
		                  <div class="col mr-2">
		                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Records</div>
		                    {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">18</div> --}}
		                  </div>
		                  <div class="col-auto">
		                    <i class="ffa fa-cube fa-2x text-gray-300"></i>
		                  </div>
		                </div>
		              </div>
		            </div>
		        </a>
		          </div> 
		            <!-- Pending Requests Card Example -->
		          <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-3">
		          	<a href="{{route('home')}}">
		            <div class="card border-left-warning shadow h-100 py-2 bg-color">
		              <div class="card-body">
		                <div class="row no-gutters align-items-center">
		                  <div class="col mr-2">
		                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">ID Card</div>
		                    {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">18</div> --}}
		                  </div>
		                  <div class="col-auto">
		                    <i class="ffa fa-cube fa-2x text-gray-300"></i>
		                  </div>
		                </div>
		              </div>
		            </div>
		        </a>
		          </div>
			</div>
	      </div>
	    </div>
    </div>
</div>
