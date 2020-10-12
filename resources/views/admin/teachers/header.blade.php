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
		        <div class="col-md-3 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li">
		         <a href="{{url('teachers')}}">
		          <div class="card border-left-primary shadow h-100 py-2 bg-color">
		            <div class="card-body {{ Request::url('teachers') ? 'card-body btn-primary' : '' }}">
		              <div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                  <div class="text-xs font-weight-bold text text-uppercase mb-1">Teachers Details</div>
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
 				<div class="col-md-3 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li">
		        <a href="{{url('teachers/assign/subject')}}">
		          <div class="card border-left-success shadow h-100 py-2 bg-color">
		            
		            <div class="{{ Request::url('assign_subject') ? 'card-body btn-primary' : '' }}">
		              	<div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Assign Subejct</div>
		                  <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
		                </div>
		                <div class="col-auto">
		                  <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
		                </div>
		              </div>
		            </div>
		          </div>
		          </a>
		        </div>
		        
		        <div class="col-md-3 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li">
		        <a href="#">
		          <div class="card border-left-success shadow h-100 py-2 bg-color">
	            
		            <div class="card-body">
		              	<div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Teacher</div>
		                  <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
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
		        <div class="col-md-3 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li">
		        <a href="#">
		          <div class="card border-left-success shadow h-100 py-2 bg-color">
	            
		            <div class="card-body">
		              	<div class="row no-gutters align-items-center">
		                <div class="col mr-2">
		                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Teams</div>
		                  <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
		                </div>
		                <div class="col-auto">
		                  <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
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