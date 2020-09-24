<div class="row">
	<div class="col-md-12 m-auto " >

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
		         <a href="{{route('dashboard')}}">
		          <div class="card border-left-primary shadow h-100 py-2 bg-color">
		            <div class="card-body">
		              <div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                  <div class="text-xs font-weight-bold text text-uppercase mb-1 col-div-mar col-div-nav {{Request()->segment(2) == 'dashboard' ? 'active-li' : ''}}">Dashboard</div>
		                </div>
		                <div class="col-auto">
		                  <i class="fas fa-fw fa-tachometer-alt fa-2x text-gray-300"></i>
		                </div>
		              </div>
		            </div>
		          </div>
		            </a>
		        </div>

		        <div class="col-md-2 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li">
		        <a href="{{route('attendance.student')}}">
		          <div class="card border-left-success shadow h-100 py-2 bg-color">
		            
			            <div class="card-body">
			              	<div class="row no-gutters align-items-center">
			                <div class="col mr-2">
			                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Student Attendance</div>
			                </div>
			                <div class="col-auto">
			                  <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
			                </div>
			              </div>
			            </div>
		          </div>
		          </a>
		        </div>

		        <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
		        <a href="{{route('attendance.staff')}}" >
		          <div class="card border-left-info shadow h-100 py-2 bg-color">
		            <div class="card-body">
		              <div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Staff Attendance</div>
		                  <div class="row no-gutters align-items-center">
		                    <div class="col-auto">
		                    </div>
		                    <div class="col">
		                      <div class="progress progress-sm mr-2">
		                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
		                      </div>
		                    </div>
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

		          <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
		          	<a href="{{route('attendance.upload')}}" >
		            <div class="card border-left-warning shadow h-100 py-2 bg-color">
		              <div class="card-body">
		                <div class="row no-gutters align-items-center">
		                  <div class="col mr-2">
		                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Upload Attendance</div>
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
		          <a href="{{route('attendance.manage_student')}}" >
		            <div class="card border-left-warning shadow h-100 py-2 bg-color">
		              <div class="card-body">
		                <div class="row no-gutters align-items-center">
		                  <div class="col mr-2">
		                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Manage Student Attendance</div>
		                  </div>
		                  <div class="col-auto">
		                    <i class="ffa fa-cube fa-2x text-gray-300"></i>
		                  </div>
		                </div>
		              </div>
		            </div>
		        </a>
		       </div> 

		        <div class="col-md-2 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
		          <a href="{{route('attendance.student_report')}}" >
		            <div class="card border-left-warning shadow h-100 py-2 bg-color">
		              <div class="card-body">
		                <div class="row no-gutters align-items-center">
		                  <div class="col mr-2">
		                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Student Report</div>
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