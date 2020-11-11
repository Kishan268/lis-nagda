@extends('layouts.main')
 @section('content')
<div id="content">
@include('admin.fees.header')

 

  <div class="container">
    <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Fees</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body">
            <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-3 col-sm-3 col-xs-11  col-div-mar col-div-nav active-li ">
            <a href="{{route('fees.index')}}">
              <div class="card  shadow h-100 py-2 bg-color">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Fees</div>
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                  </div>
                  </div>
                </div>
              </div>
              </a>
            </div>
             <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="{{route('fees-heads.index')}}">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Heads</div>
                      
                      <i class="fa fa-header fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div> 
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
            <a href="http://127.0.0.1:8000/student_manage">
              <div class="card  shadow h-100 py-2 bg-color ">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Draft Fees</div>
                      <div class="row no-gutters align-items-center">
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
            <a href="http://127.0.0.1:8000/student_previous-detail">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Fees Setting</div>
                      <div class="row no-gutters align-items-center">
                      <i class="fa fa-money fa-2x text-gray-300"></i>

                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
          </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li">
            <a href="http://127.0.0.1:8000/student-import-export">
            <div class="card  shadow h-100 py-2 bg-color">
            <div class="card-body">
              
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">New Admission Fees</div>
                    
                    <i class="fa fa-database fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div> 
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/student-import-export">
            <div class="card  shadow h-100 py-2 bg-color">
            <div class="card-body">
              
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Dynamic Fees</div>
                    
                    <i class="fa fa-database fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
                <a href="http://127.0.0.1:8000/home">
                <div class="card shadow h-100 py-2 bg-color">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pay Regular Fees</div>
                        
                        <i class="fa fa-money fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
            </a>
          </div>   
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Concession</div>
                      
                      <i class="fa fa-cube fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Paid History</div>
                      
                      <i class="fa fa-history fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div> 
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Payment Gateway Setting</div>
                      
                      <i class="fa fa-credit-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>   
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Bulk Fees Upload By Fee Name</div>
                      
                      <i class="fa fa-cloud-upload fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>   
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Pay Fine Due</div>
                      
                      <i class="fa fa-usd fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>  
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Achive Folder</div>
                      
                      <i class="fa fa-file-archive-o fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div> 
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Check Payment</div>
                      
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>  
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Edit Fess</div>
                      
                      <i class="fa fa-money fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-11  col-div-mar col-div-nav active-li mt-2">
            <a href="http://127.0.0.1:8000/home">
              <div class="card shadow h-100 py-2 bg-color">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1" style="font-size: 10px;">Bank Wise Cheque Upload</div>
                      
                      <i class="fa fa-bank fa-2x text-gray-300"></i>
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

<div class="container-fluid main-content">
 
<div class="content-header">
    <section class="panel panel-default">
        <header class="panel-heading">
            <h2><strong>FEES</strong></h2>
        </header>
        <div class="panel-body">
          <ul class="nav-horizontal text-center">

            <li>
              <a href="index.php?plugin=Fees&amp;action=listFees" onclick="showhide('Div7');">
             
                    <i class="fa fa-money"></i>
                 Fee
              </a>
            </li>


             <li>
      <a onclick="showhide('Div2');" href="index.php?plugin=Fees&amp;action=draftindex">
        <i class="fa fa-money"></i> Draft Fees
      </a>
    </li>
     <li>
              <a href="index.php?plugin=Fees&amp;action=fees_setting" onclick="showhide('Div7');">
             
                    <i class="fa fa-money"></i>
                 Fee Setting
              </a>
            </li>
	    <li>
	    </li><li>
	    
              <a href="index.php?plugin=Fees&amp;action=admissionFee" onclick="showhide('Div7');">
                <i class="fa fa-database"></i> New Admission Fees
              </a>
            </li>
	    <li>
		<a href="index.php?plugin=Fees&amp;action=dynamicFees" onclick="showhide('Div7');"><i class="fa fa-database"></i> Dynamic Fees</a>
	</li>
            <li>
              <a href="index.php?plugin=Fees&amp;action=payFee" onclick="showhide('Div7');">
                      <i class="fa fa-money"></i>
                  Pay Regular Fees
              </a>
            </li>

        
            <li>
              <a href="index.php?plugin=Fees&amp;action=feesConcession" onclick="showhide('Div7');">
                        <i class="gi gi-settings"></i>
                  Concessions
              </a>
            </li>
	     <li>
              <a href="index.php?plugin=Fees&amp;action=feesHeads" onclick="showhide('Div7');">
                      <i class="fa fa-header"></i>
                  Heads
              </a>
            </li>
	                <li>
              <a href="index.php?plugin=Fees&amp;action=getTransactions" onclick="showhide('Div7');">
                          <i class="fa fa-history"></i>
                 Paid History
              </a>
            </li>
                      
          
              <li>
              <a href="index.php?plugin=Fees&amp;action=paymentGatewaySetting" onclick="showhide('Div7');">
                          <i class="gi gi-settings"></i>
                 Payment Gateway<br>Setting
              </a>
            </li>
           
              <!-- <li>
              <a href="index.php?plugin=Fees&action=feesAssignProductWise" onclick="showhide('Div7');">
                          <i class="fa fa-money"></i>
             Fees Assign Product wise 
              </a>
            </li> -->
            
           
              <li>
              <a href="index.php?plugin=Fees&amp;action=UBI_page" onclick="showhide('Div7');">
                          <i class="fa fa-cloud-upload"></i>
             Bulk Fees<br>Upload 
              </a>
            </li>
            
           
              <li>
              <a href="index.php?plugin=Fees&amp;action=bulkFeesUploadByFeeName" onclick="showhide('Div7');">
                          <i class="fa fa-cloud-upload"></i>
             Bulk Fee Upload<br>By Fee Name
              </a>
            </li>
             
              <li>
              <a href="index.php?plugin=Fees&amp;action=payFineDues" onclick="showhide('Div7');">
                          <i class="fa fa-usd"></i>
              Pay Fine Dues
              </a>
            </li>
                         <li>
              <a href="index.php?plugin=Fees&amp;action=archive_index">
                          <i class="gi gi-new_window"></i>
             Archive Folder
              </a>
            </li>
            <li>
              <a href="index.php?plugin=Fees&amp;action=cheque_transactions">
                <i class="fa fa-money"></i>
                  Cheque Payments
              </a>
            </li>
              <li>
              <a href="index.php?plugin=Fees&amp;action=edit_fees">
                <i class="gi gi-new_window"></i>
                  Edit Fees
              </a>
            </li>
             <li>
              <a href="index.php?plugin=Fees&amp;action=assignedFee">
                <i class="gi gi-new_window"></i>
                  Verify Assigned Fees
              </a>
            </li>

             <li>
              <a href="index.php?plugin=Feesv3&amp;action=bankChequeUpload">
                <i class="fa fa-bank"></i>
                 Bank Wise Cheque Upload
              </a>
            </li>

            <li>
              <a href="index.php?plugin=Feesv3&amp;action=chequeHold">
                <i class="fa fa-money"></i>
                 Cheque Hold 
              </a>
            </li>
            <li>
              <a href="index.php?plugin=Feesv3&amp;action=chequeBounce">
                <i class="fa fa-money"></i>
                Cheque Bounce 
              </a>
            </li>

            <li>
              <a href="index.php?plugin=Feesv3&amp;action=studentHeadWiseChallanNumber" onclick="showhide('Div7');">
                          <i class="fa fa-cloud-upload"></i>
            Head Challan
              </a>
            </li>

            <li>
              <a href="index.php?plugin=Feesv3&amp;action=feesHeadAssign" onclick="showhide('Div7');">
                          <i class="fa fa-header"></i>
           Head Assign
              </a>
            </li>

             <li>
              <a href="index.php?plugin=Feesv3&amp;action=aposFeesUpload" onclick="showhide('Div7');">
                          <i class="gi gi-new_window"></i>
          APOS FEES UPLOAD
              </a>
            </li>

             <li>
              <a href="index.php?plugin=Feesv3&amp;action=studentFeesUpload" onclick="showhide('Div7');">
                          <i class="gi gi-new_window"></i>
         Student Fees Upload
              </a>
            </li>

              <li>
              <a href="index.php?plugin=Feesv3&amp;action=applyFeesDiscount">
                <i class="fa fa-money"></i>
                Fees Discount
              </a>
            </li>

            <li>
              <a href="index.php?plugin=Feesv3&amp;action=listFees" onclick="showhide('Div7');">
             
                    <i class="fa fa-money"></i>
                 Group Fee
              </a>
            </li>

             <li>
              <a href="index.php?plugin=Feesv3&amp;action=studentGroupFeesUpload" onclick="showhide('Div7');">
             
                    <i class="fa fa-cloud-upload"></i>
                 Group Fee Upload
              </a>
            </li>

              <li>
                  <a href="index.php?plugin=Fees&amp;action=bulkfeesConcessionSetting" onclick="showhide('Div7');">
                      <i class="gi gi-settings"></i>
                      Bulk Fees Concessions Setting
                  </a>
              </li>

             

              <li>
                  <a href="index.php?plugin=Feesv3&amp;action=eChequeFees" onclick="showhide('Div7');">
                      <i class="gi gi-bank"></i>
                      e-Challan Fees
                  </a>
              </li>

          </ul>
        </div>
    </section>          
  </div>
</div>

 @endsection