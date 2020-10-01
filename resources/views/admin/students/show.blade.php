 @extends('layouts.main')
 @yield('content')
 @section('content')

<div class="container">
   <div class="col-lg-12">
{{-- @include('layouts.comman') --}}
@include('admin.students.header')

  
<div class="container">
  <div class="row mt-2">
        <div class="col-lg-12">

        <!-- Dropdown Card Example -->
        <div class="card shadow mb-4">
          <!-- Card Header - Dropdown -->
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Show Student</h6>
            
          </div>
          <!-- Card Body -->
<div class="card-body">
   <div class="col-md-12">
      <div class="panel panel-default">
         <div class="panel-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
          <div class="col-md-12">
           <div class="panel panel-default">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="Basic_details-tab" data-toggle="tab" href="#Basic_details" role="tab" aria-controls="Basic_details" aria-selected="true">Basic Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="acadmic_details-tab" data-toggle="tab" href="#acadmic_details" role="tab" aria-controls="acadmic_details" aria-selected="false">Academic Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="guardian_info-tab" data-toggle="tab" href="#guardian_info" role="tab" aria-controls="guardian_info" aria-selected="false">Guardian Info</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="student_address-tab" data-toggle="tab" href="#student_address" role="tab" aria-controls="student_address" aria-selected="false">Student Address</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="bank_details-tab" data-toggle="tab" href="#bank_details" role="tab" aria-controls="bank_details" aria-selected="false">Bank Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="student_document-tab" data-toggle="tab" href="#student_document" role="tab" aria-controls="student_document" aria-selected="false">Student Document</a>
              </li>
            </ul>
            <hr>
    <div class="panel-body">
      <div class="row mt-3">
        <div class="col-md-12">
          <form action="{{route('student_detail.update',$studentsMast->id)}}" method="post">
                @csrf
                @method('PUT')
              <div>
                <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="Basic_details" role="tabpanel" aria-labelledby="Basic_details-tab">
                  <section>

                <h3>Basic Details</h3>
                    
				<hr>
                <div class="row form-group mt-3">
                	 <div class="col-md-3">
		  			<label class="">Student Photo</label>
		  			<img src="{{asset($studentsMast->photo !=null ? 'storage/'.$studentsMast->photo : 'storage/admin/student_demo.png')}}" style="width: 100px; height: 100px;">
		  		</div>
                  <div class="col-md-3 col-xs-6 col-sm-6 error-div">
                    <label for="std_class" class="required">Student Name</label>
                    <input type="" name="" class="form-control" value="{{$studentsMast->f_name}}.{{$studentsMast->l_name}}" readonly>
                      
                  </div>
                  <div class="col-md-3 col-xs-6 col-sm-6 error-div">
                    <label for="std_class" class="required">Class</label>
                    <input type="" name="" class="form-control" value="{{$studentsMast->student_class->class_name}}" readonly>
                      
                  </div>
                  <div class="col-md-3 col-xs-6 col-sm-6 error-div">
                    <label class="required"> Batch</label>
                    <input type="" name="" class="form-control" value="{{$studentsMast->student_batch->batch_name}}" readonly>
                      
                  </div>
                  <div class="col-md-3 col-xs-6 col-sm-6 error-div">
                    <label class="required">Section</label>
                    <input type="" name="" class="form-control" value="{{$studentsMast->student_section->section_name}}" readonly>
                   
                  </div>
                  <div class="col-md-3 col-xs-6 col-sm-6 error-div">
                    <label class="required">Admision No</label>
                    <input type="text" name="admision_no" value="{{$studentsMast->admision_no}}" readonly>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label class="">Class Roll Number</label>
                      <input type="text" name="roll_no" class="form-control" value="{{$studentsMast->roll_no}}" readonly>
                    </div>
                   
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div has-success">
                      <label class="required">Student Status&nbsp;</label>
                      <input type="" name="" class="form-control" value="{{$studentsMast->status =='R' ? 'Running':''}} {{$studentsMast->status =='P' ? 'Pass':''}} {{$studentsMast->status =='F' ? 'Fail':''}}" readonly>
                     
                    </div>
                </div>
                <div class="row form-group">        
                    

                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label class="required">Mobile Number</label>
                      <input type="text" name="s_mobile" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$studentsMast->s_mobile}}" readonly> 
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label class="required">Date of Birth</label>
                      <input type="text" name="dob" class="form-control datepicker required" data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}" value="{{$studentsMast->dob}}" readonly>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label class="required">Birth Place</label>
                      <input type="text" name="birth_place" class="form-control birth_place required" placeholder="" id="birth_place" value="{{$studentsMast->birth_place}}" readonly>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label class="required">Email Address</label> <span class="text-muted"><span class="text-muted">must be unique</span>
                      <input type="text" name="email" class="form-control required" value="{{$studentsMast->email}}" readonly> 
                    </div>
                  </div>  
                  <div class="row form-group">
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label class="required">Gender</label>
                      <input type="" name="" value="{{$studentsMast->gender == '1' ? 'Male' : ''}} {{$studentsMast->gender == '2' ? 'Female' : ''}}{{$studentsMast->gender == '3' ? 'Other' : ''}}" class="form-control" readonly>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label class="required">Cast Category</label>
                      <input type="" name="" value="{{$studentsMast->castCategory->caste_category_name}}" class="form-control" readonly>
                        
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label>Religion</label>
                      <input type="" name="" value="{{$studentsMast->stdReligions->religion_name}}" class="form-control" readonly>
                    </div>
                 
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label>Blood Group</label>
                      <input type="" name="" value="{{$studentsMast->stdBloodGroup->blood_group_name}}" class="form-control" readonly>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label>Specific Ailment</label>
                      <input type="text" name="spec_ailment" class="form-control" placeholder="Mole on nose. etc" value="{{$studentsMast->spec_ailment}}" readonly>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label>Age</label>
                      <input type="text" name="age" class="form-control age" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$studentsMast->age}}" readonly>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <label>Nationality</label>
                      <input type="" name="" value="{{$studentsMast->stdNationality->nationality_name}}" class="form-control" readonly>
                    </div>
                 
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label>Taluka(Tehsil)</label>
                      <input type="text" name="taluka" class="form-control" value="{{$studentsMast->taluka}}" readonly>
                     
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                      <label>Mother tongue</label>
                     
                      <input type="" name="" class="form-control" value="{{$studentsMast->mothetongueMast->mothetongue_name}}" readonly>
                      
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label>Student SSMID</label>
                      <input type="text" name="s_ssmid" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$studentsMast->s_ssmid}}" readonly>
                     
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label>Family SSMID</label>
                      <input type="text" name="f_ssmid" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$studentsMast->f_ssmid}}" readonly="">
                     
                    </div>
                   
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">
                      <label>Aadhar Card Number</label>
                      <input type="text" name="aadhar_card" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$studentsMast->aadhar_card}}" readonly="">
                        
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">

                    <label for="rte"> Teacher Ward </label>
                    <input type="" name="" class="form-control" value="{{$studentsMast->teacher_ward == '1' ? 'Yes' :'No'}}" readonly="">
                        
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 error-div">

                     <label for="rte"> CBSE  Registration no </label>
                      <input class="form-control" id="CBSC_reg" name="cbsc_reg" type="text" value="{{$studentsMast->cbsc_reg}}" readonly="">
                        
                    </div>
                  </div>
                 
                  <div class="input-group mb-3 group-end">
                      <a class="btn btn-success btnNext" id="Basic_details">Next</a>

                    </div>
                    <!--/. form element wrap -->

                  </div>

                  <div class="tab-pane fade" id="acadmic_details" role="tabpanel" aria-labelledby="acadmic_details-tab">
                    <h3>Academic Details</h3>
                    <hr>
                   <section>
                        
                    <div class="form-group row relation">
                      <div class="col-sm-6 col-md-4 col-xs-6 error-di">
                        <label >Previous School (last studied) <strong class="text-danger">*</strong></label>
                        <input type="text" name="prev_school" class="form-control " id="prev_school" value="{{$studentsMast->prev_school}}" readonly>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 error-di">
                          <label class="required"> Year (left from Previous School)  <strong class="text-danger">*</strong>
                          </label>
                        <input type="text" name="year_of_prev_school" class="form-control " id="year_of_prev_school" value="{{$studentsMast->year_of_prev_school}}" readonly>
                          </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 error-di">
                          <label class="">Address <strong class="text-danger">*</strong>
                          </label>
                          <textarea class="form-control" name="prev_school_address" id="acadmic_address" readonly> {{$studentsMast->prev_school_address}}
                          </textarea>
                        </div>
                          
                        </div>
                        <div class="row form-group">
                          <div class="col-md-4 col-xs-6 col-sm-6 error-di">
                            <label class="">City</label>
                            <input type="" name="" class="form-control" value="{{$studentsMast->acadmic_cityMast->city_name}}" readonly="">
                          </div>
                          <div class="col-md-4 col-xs-6 col-sm-6 error-di">
                            <label class="" id="">State</label>
                            <input type="" name="" class="form-control" value="{{$studentsMast->acadmic_stateMast->state_name}}" readonly="">
                          </div>
                          <div class="col-md-4 col-xs-6 col-sm-6 error-di">
                            <label class="">Pin</label>
                            <input type="text" name="acadmic_pin" class="form-control" id="acadmic_pin" value="{{$studentsMast->p_zip_code}}" readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Country</label>
                              <input type="" name="" class="form-control" value="{{$studentsMast->acadmic_country_mast->country_name}}" readonly>
                            </div>
                            <div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Cast</label>
                              <input type="text" name="acadmic_cast" class="form-control" id="acadmic_cast" value="{{$studentsMast->acadmic_cast_id}}" readonly>
                            </div>
                            <div class="col-md-4 col-xs-6 col-sm-6 error-di"><label> Attendance Reg. No (In device) </label>
                              <input type="text" name="acadmic_attendance_reg_no" class="form-control" id="acadmic_attendance_reg_no" value="{{$studentsMast->acadmic_attendance_reg_no}}" readonly>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-6 error-di">
                              <label class="">Remark <strong class="text-danger">*</strong></label>
                              <textarea class="form-control" name="acadmic_remark" id="acadmic_remark" readonly>{{$studentsMast->acadmic_remark}}</textarea>
                            </div>
                              <hr>
                            </div>
                        <div class="row form-group">
                          <div class=""></div>
                        </div>
                      </section>  
                    <div class="input-group mb-3 group-end">
                      <a class="btn btn-danger btnPrevious">Previous</a>
                      <a class="btn btn-success btnNext" id="Basic_details">Next</a>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="guardian_info" role="tabpanel" aria-labelledby="guardian_info-tab">
                    <h3>Guardian Info</h3>
                    <hr>
                        <section>
                        <div class="row" >
                          <div class="col-md-12" style="border:1px solid #cacaca; " id="guard_info" >

                          </div>
                        </div>
                        </section>
                    <div class="input-group mb-3 group-end">
                      <a class="btn btn-danger btnPrevious">Previous</a>
                      <a class="btn btn-success btnNext">Next</a>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="student_address" role="tabpanel" aria-labelledby="student_address-tab">
                      <h3>Student Address</h3>
                      <section>
                      
                      <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="panel-title">Permanent Address:</h1>
                    </div>
                    <div class="panel-body">
                      <div class="row form-group">
                        <div class="col-md-4 error-di">
                          <label class="required">Address Line</label>
                          <input type="text" class="form-control" name="p_address" id="p_address" value="{{$studentsMast->p_address}}">
                        </div>
                        <div class="col-md-4 error-di">
                          <label class="required">Country Name</label>
                          <select name="p_country_id" class="form-control" id="p_country_id" readonly>
                          <option value="{{$studentsMast->p_country->id}}">{{$studentsMast->p_country->country_name}}
                          </option>
                          </select>
                        </div>
                        <div class="col-md-4 error-di">
                          <label class="required">State Name</label>
                          
                          <select name="p_state_id" class="form-control" readonly >
                          <option value="{{$studentsMast->p_state->id}}">{{$studentsMast->p_state->state_name}}
                          </option>
                          </select> 
                        </div>

                        </div>
                        <div class="row">
                        <div class="col-md-4 error-di">
                          <label class="required">City Name</label>
                          <select name="p_city_id" class="form-control" readonly> 
                            <option value="{{$studentsMast->p_city->id}}">{{$studentsMast->p_city->city_name}}
                          </option>
                          </select>
                        </div>
                        <div class="col-md-4 error-di">
                          <label class="required">Zip Code</label>
                          <input type="text" name="p_zip_code" class="form-control" id="p_zip_code" value="{{$studentsMast->p_zip_code}}" readonly>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr><hr>
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h1 class="panel-title">Local Address:</h1>
                    </div>
                    <div class="panel-body">
                      <div class="row form-group">
                        <div class="col-md-4 error-di">
                          <label class="required">Address Line</label>
                          <input type="text" class="form-control" name="l_address" id="l_address" value="{{$studentsMast->l_address}}">
                        </div>
                        <div class="col-md-4 error-di">
                          <label class="required">Country Name</label>
                          <select name="l_country_id" class="form-control" readonly>
                          <option value="{{$studentsMast->l_country->id}}">{{$studentsMast->l_country->country_name}}
                          </option> 

                          @foreach($country as $countries)
                            <option value="{{$countries->id}}" >{{$countries->country_name}}</option>
                          @endforeach
                          </select>
                        </div>
                        <div class="col-md-4 error-di">
                          <label class="required">State Name</label>
                          <select name="l_state_id" class="form-control" readonly>
                            <option value="{{$studentsMast->l_state->id}}">{{$studentsMast->l_state->state_name}}
                          </option>
                          </select>
                        </div>

                        </div>
                        <div class="row">
                        <div class="col-md-4 error-di">
                          <label class="required">City Name</label>
                          
                          <select name="l_city_id" class="form-control"  readonly>
                            <option value="{{$studentsMast->l_city->id}}">{{$studentsMast->l_city->city_name}}
                          </option>
                          </select>
                        </div>
                        <div class="col-md-4 error-di">
                          <label class="required">Zip Code</label>
                          <input type="text" name="l_zip_code" class="form-control" id="l_zip_code" value="{{$studentsMast->l_zip_code}}" readonly>
                        </div>
                      </div>
                    </div>
                      </div>
                   
                      </section>
                    <div class="input-group mb-3 group-end">
                      <a class="btn btn-danger btnPrevious">Previous</a>
                      <a class="btn btn-success btnNext">Next</a>
                    </div>
                  </div>

                   <div class="tab-pane fade" id="bank_details" role="tabpanel" aria-labelledby="bank_details-tab">
                    <h3>Bank Details</h3>
                    <hr>
                      <section>
                      <div class="row form-group">
                        <div class="col-md-6 col-sm-6 col-xs-6 error-div">
                          <label>Bank Name</label>
                          <input type="text" name="bank_name" class="form-control" value="{{$studentsMast->bank_name}}" readonly> 

                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 error-div">
                          <label>Branch</label>
                          <input type="text" name="bank_branch" class="form-control" value="{{$studentsMast->bank_branch}}" readonly>
                        </div>

                      </div>
                      <div class="row form-group">
                        <div class="col-md-4 col-sm-6 col-xs-6 error-div">
                          <label>Account Name</label>
                          <input type="text" name="account_name" class="form-control" value="{{$studentsMast->account_name}}" readonly>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 error-div">
                          <label>Account Number</label>
                          <input type="text" name="account_no" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{$studentsMast->account_no}}" readonly>
                      </div>
                        <div class="col-md-4 col-sm-6 col-xs-6 error-div">
                          <label>IFSC CODE</label>
                          <input type="text" name="ifsc_code" class="form-control" id="ifsc_code" value="{{$studentsMast->ifsc_code}}" readonly>
                        </div>
                      </div>
                      </section>
                    <div class="input-group mb-3 group-end">
                      <a class="btn btn-danger btnPrevious">Previous</a>
                      <a class="btn btn-success btnNext">Next</a>
                    </div>
                  </div>

            <div class="tab-pane fade" id="student_document" role="tabpanel" aria-labelledby="student_document-tab">
              <div class="col-md-12 mt-2"> 
                <h3>Students Document</h3><hr>

                <input type="hidden" name="studentid" id="studentid" value="">
                  <div class="card">
                          <table border="0" style="" id="student_doc">
                            <thead>
                               <tr >
                                  {{-- <th rowspan="2">ID</th> --}}
                                  <th> SNo.</th>
                                  <th> Document Title  </th>
                                  <th> Document Description </th>
                                  <th> File </th>
                                  <th> Action </th>
                               </tr>
                             </thead>
                             <tbody>
                             @if(count($studentsMast->studenst_doc)>0)
                             <?php $count=1; ?>
                              @foreach($studentsMast->studenst_doc as $studenstDoc)
                               <tr id="1">
                                  <td id="sr_no1">{{$count++}}</td>
                                    <td> 
                                       <input id="doc_title" name="doc_title[]" class="form-control" type="text" placeholder="Enter doc title" value="{{ $studenstDoc->doc_title }}" readonly>

                                    </td>
                                    <td> 
                                       <textarea id="doc_description" name="doc_description[]" class="form-control doc_description" placeholder="Enter doc description" readonly>{{ $studenstDoc->doc_description }}</textarea> 
                                    </td>
                                    <td> 
                                     
                                    <img src="{{asset($studenstDoc->student_doc !=null ? 'storage/'.$studenstDoc->student_doc : 'images/student_demo.png')}}" style="width:50px;padding-top:10px;"><span>{{$studenstDoc->student_doc !=null ? ' Photo Uploaded' : ' Not Uploaded'}}</span>
		                           
                                    </td>
                                   <td><a href="" ><i class="fa fa-arrow-down"></i> Download</a></td>
                                @endforeach
                                
                             @endif
                              
                             </tbody>
                          </table>
                         {{--  <h2 align="right"> <strong> </strong><span class="total_local_fare_amount">0</span> </h2> --}}
                    </div>
                  <div class="input-group mb-3 group-end mt-2">
                    <a class="btn btn-danger btnPrevious">Previous</a>
                    <input type="submit" name="submit" value="Submit"  class="btn btn-success btnSubmit">
                  </div>
              </div>
            </div>
            </div>
        </form>
        <input type="hidden" name="email_check" value="" id="email_check">
      </div>
          
      </div>
    </div>
    </div>
  </div>
</div>
</section>
<input type="hidden" name="email_check" value="" id="email_check">
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
