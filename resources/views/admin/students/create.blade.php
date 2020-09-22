 @extends('layouts.main')
 @yield('content')
 @section('content')

<div class="container">
	 <div class="col-lg-12">
@include('layouts.comman')
  
<div class="container">
	<div class="row mt-2">
	      <div class="col-lg-12">

	      <!-- Dropdown Card Example -->
	      <div class="card shadow mb-4">
	        <!-- Card Header - Dropdown -->
	        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	          <h6 class="m-0 font-weight-bold text-primary">Add Student</h6>
	          
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
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<form id="example-form" action="{{route('student_detail.store')}}" method="post" enctype="multipart/form-data">
					    <div>
					    	<div class="tab-content" id="myTabContent">
							  <div class="tab-pane fade show active" id="Basic_details" role="tabpanel" aria-labelledby="Basic_details-tab">
							    <section>

					        	<h3>Basic Details</h3>
						        <div class="row form-group">
									<div class="col-md-12 error-div">
										<label >Student Photo</label>
										<input type="file" name="s_photo" id="s_photo" accept="image/*" value="{{old('s_photo')}}">
										@error('s_photo')
											<span class="text-danger">
												<strong>{{$message}}</strong>
											</span>
										@enderror
									
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-3 col-xs-6 col-sm-6 error-div">
										<label for="std_class" class="required">Class</label>
										<select class="form-control required" name="std_class_id" id="std_class_id">
											<option value="">Select Class</option>
											@foreach($classes as $class)
												<option value="{{$class->id}}">{{$class->class_name}}</option>
											@endforeach
										</select>
										@error('std_class')
											<span class="text-danger">
												<strong>{{$message}}</strong>
											</span>
										@enderror
									</div>
									<div class="col-md-3 col-xs-6 col-sm-6 error-div">
										<label class="required"> Batch</label>
										<select class="form-control required" name="batch_id">
											<option value="">Select Batch</option>
											@foreach($batches as $batch)
												<option value="{{$batch->id}}">{{$batch->batch_from}}-{{$batch->batch_to}}</option>
											@endforeach
										</select>
										@error('batch_id')
											<span class="text-danger">
												<strong>{{$message}}</strong>
											</span>
										@enderror
									</div>
									<div class="col-md-3 col-xs-6 col-sm-6 error-div">
										<label class="required">Section</label>
										<select class="form-control required" name="section_id" id="section_id">
											<option value="">Select Section</option>

											@foreach($sections as $section)
												<option value="{{$section->id}}">{{$section->section_name}}</option>
											@endforeach
										</select>
										@error('section')
											<span class="text-danger">
												<strong>{{$message}}</strong>
											</span>
										@enderror
									</div>
									<div class="col-md-3 col-xs-6 col-sm-6 error-div">
										<label class="required">Admision No</label>
										<input type="text" name="admision_no">
										@error('admision_no')
											<span class="text-danger">
												<strong>{{$message}}</strong>
											</span>
										@enderror
									</div>
									
									
								</div>
								<div class="row form-group">
									
									<div class="col-md-3 col-xs-6 col-sm-6 error-div">
										<label class="required">Admission Date</label>
										<input type="text" name="addm_date" class="form-control datepicker required addm_date"  data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}">
										@error('addm_date')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label class="">Class Roll Number</label>
											<input type="text" name="roll_no" class="form-control">
										</div>
										
										<div class="col-md-3 col-sm-6 col-xs-6 error-div has-success">
											<label class="required">Student Status&nbsp;</label>
											<select class="form-control required status" name="status" aria-invalid="false">
												<option value="R" selected="">Running</option>
												<option value="P">Pass</option>
												<option value="F">Fail</option>
											</select>
										</div>
																				
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label class="required">First Name</label>
											<input type="text" name="f_name" id="f_name" class="form-control required">
											@error('f_name')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>								
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label>Middle Name</label>
											<input type="text" name="m_name" id="m_name" class="form-control">
											@error('m_name')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>									
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label class="required">Last Name</label>
											<input type="text" name="l_name" id="l_name" class="form-control required">
											@error('l_name')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										
									
										<div class="col-md-3 col-sm-6 col-xs-6 error-div passout_date" style="display: none;">
											<label class="required">Passout Date</label>
											<input type="text" name="passout_date" class="form-control datepicker " readonly="true" data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}">
										</div>

										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label class="required">Mobile Number</label>
											<input type="text" name="s_mobile" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"> 
											@error('s_mobile')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label class="required">Date of Birth</label>
											<input type="text" name="dob" class="form-control datepicker required" data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}">
											@error('dob')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label class="required">Birth Place</label>
											<input type="text" name="birth_place" class="form-control birth_place required" placeholder="" id="birth_place">
											@error('birth_place')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label class="required">Email Address</label> <span class="text-muted"><span class="text-muted">must be unique</span>
											<input type="text" name="email" class="form-control required"> 
											
											@error('email')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
									</div>	
									<div class="row form-group">
										<div class="col-md-4 col-sm-6 col-xs-6 error-div">
											<label class="required">Gender</label>
											<select name="gender" class="form-control required">
												<option value="">Select Gender</option>
													@foreach($studentGenders[0] as $key =>$studentGender)
														<option value="{{$key}}">{{$studentGender}}</option>
												@endforeach
											</select>
											@error('gender')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-4 col-sm-6 col-xs-6 error-div">
											<label class="required">Cast Category</label>
											<select class="form-control required" name="reservation_class_id">
												<option value="">Select Category</option>
												@foreach($castCategores as $castCategore)
													<option value="{{$castCategore->id}}">{{$castCategore->caste_category_name}}</option>
												@endforeach
											</select>
											@error('reservation_class_name')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-4 col-sm-6 col-xs-6 error-div">
											<label>Religion</label>
											<select class="form-control" name="religion_id">
												<option value="">Select Religion</option>
												@foreach($studentReligions as $key =>$studentReligion)
														<option value="{{$studentReligion->id}}">{{$studentReligion->religion_name}}</option>
												@endforeach
											</select>
											@error('religion_name')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
									</div>	
									<div class="row form-group">
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label>Blood Group</label>
											<select class="form-control" name="blood_id">
												<option value="">Select Blood Group</option>
												@foreach($studentBloodGroups as$studentBloodGroup)
														<option value="{{$studentBloodGroup->id}}">{{$studentBloodGroup->blood_group_name}}</option>
												@endforeach
											</select>
											@error('blood_group')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label>Specific Ailment</label>
											<input type="text" name="spec_ailment" class="form-control" placeholder="Mole on nose. etc">
											@error('spec_ailment')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label>Age</label>
											<input type="text" name="age" class="form-control age" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
											@error('age')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6">
											<label>Nationality</label>
											<select name="nationality_id" class="form-control">
												<option value="">Select Nationality</option>
												@foreach($studentNationalites as $key =>$studentNationalite)
														<option value="{{$studentNationalite->id}}">{{$studentNationalite->nationality_name}}</option>
												@endforeach
											</select>
											@error('nationality_name')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="row form-group" >
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label>Taluka(Tehsil)</label>
											<input type="text" name="taluka" class="form-control">
											@error('taluka')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6">
											<label>Mother tongue</label>
											<select name="language_id" class="form-control">
											<option value="">Select Mother Tongue</option>
											 	@foreach($studentMothertongues as $studentMothertongue)<option value="{{$studentMothertongue->id}}">{{$studentMothertongue->mothetongue_name}}</option>@endforeach >
											</select>
											@error('language_id')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label>Student SSMID</label>
											<input type="text" name="s_ssmid" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
											@error('s_ssmid')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label>Family SSMID</label>
											<input type="text" name="f_ssmid" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
											@error('f_ssmid')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="form-group row">
										<div class="col-md-3 col-sm-6 col-xs-6 error-div">
											<label>Aadhar Card Number</label>
											<input type="text" name="aadhar_card" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
												@error('f_ssmid')
													<span class="text-danger">
														<strong>{{$message}}</strong>
													</span>
												@enderror
										</div>
									</div>
									<div class="form-group">
										<div class="row" style="background: #4f5775;
															    color: #fff;
															    padding: 10px;
															    border-radius: 10px;
															    margin: 20px;">
                                            <div class="col-md-3">
                                                 <label for="phone1">
                                                Student User Name
                                                </label>
                                                <input class="form-control required" id="username" name="username" type="text">
                                                <spam id="usererror" style="color: red; display: none;"></spam>
                                            </div>
                                            
                                             <div class="col-md-3">
                                                 <label for="phone1">
                                                 Password
                                                </label>
                                                <input class="form-control required" id="password" name="password" type="password">
                                            </div>
                                         <br>   
                                         <br>   
                                         <div class=""></div>
                                       
                                    </div>
									</div>
									<div class="row">
                                <div class="col-md-3">

                                    <label for="rte"> Teacher Ward </label>
                                    <select class="form-control" name="teacher_ward" id="teacher_ward">
                                        <option value="">Select</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    
                                </div>
                                 <div class="col-md-3">

                                    <label for="rte"> CBSE  Registration no </label>
                                  <input class="form-control" id="CBSC_reg" name="cbsc_reg" type="text">
                                    
                                </div>
								{{-- <div class="col-md-3">
									<label for="add_fees">Add Fees</label>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="radio" value="Yes" name="add_fees" checked="" class="form-control required">Yes
                                        </div>
                                        <div class="col-md-1">
                                            <input type="radio" value="No" name="add_fees" class="form-control required">No
                                        </div>
                                    </div>
									
								</div> --}}
                                
							</div>
						        </section>
									<div class="input-group mb-3 group-end">
								      <a class="btn btn-success btnNext" id="Basic_details">Next</a>

								    </div>
								    <!--/. form element wrap -->

								  </div>

								  <div class="tab-pane fade" id="acadmic_details" role="tabpanel" aria-labelledby="acadmic_details-tab">
								    <h3>Academic Details</h3>
							        <section>
							        	
				        		<div class="form-group row relation">
				        			<div class="col-sm-6 col-md-4 col-xs-6 error-di">
				        				<label >Previous School (last studied) <strong class="text-danger">*</strong></label>
				        				<input type="text" name="prev_school" class="form-control " id="prev_school">
				        				</div>
				        				<div class="col-md-4 col-sm-6 col-xs-6 error-di">
				        					<label class="required"> Year (left from Previous School)  <strong class="text-danger">*</strong>
				        					</label>
				        				<input type="text" name="year_of_prev_school" class="form-control " id="year_of_prev_school">
				        					</div>
				        				<div class="col-md-4 col-sm-6 col-xs-6 error-di">
				        					<label class="">Address <strong class="text-danger">*</strong>
				        					</label>
				        					<textarea class="form-control" name="address" id="acadmic_address">
				        					</textarea>
				        				</div>
				        					
				        				</div>
				        				<div class="row form-group">
				        					<div class="col-md-4 col-xs-6 col-sm-6 error-di">
				        						<label class="">City</label>
				        						<select name="acadmic_city_id" class="form-control" id="acadmic_city_id">
				        						<option value="">Select City</option>
			        							@foreach($city as $cities)
													<option value="{{$cities->state_id}}" >{{$cities->city_name}}</option>
												@endforeach
				        						</select>
				        					</div>
				        					<div class="col-md-4 col-xs-6 col-sm-6 error-di">
				        						<label class="" id="">State</label>
				        						<select name="acadmic_state_id" class="form-control" id="acadmic_state_id">
				        						<option value="">Select State</option>
				        						<option value="0"></option></select>
				        					</div>
				        					<div class="col-md-4 col-xs-6 col-sm-6 error-di">
				        						<label class="">Pin</label>
				        						<input type="text" name="acadmic_pin" class="form-control" id="acadmic_pin">
				        						</div>
				        					</div>
				        					<div class="form-group row">
				        						<div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Country</label>
				        							<select name="acadmic_country_id" class="form-control" id="acadmic_country_id">
				        								<option value="">Select Country</option>
				        								<option value="0"></option></select>
				        						</div>
				        						<div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Cast</label>
				        							<input type="text" name="acadmic_cast" class="form-control" id="acadmic_cast">
				        						</div>
				        						<div class="col-md-4 col-xs-6 col-sm-6 error-di"><label> Attendance Reg. No (In device) </label>
				        							<input type="text" name="acadmic_attendance_reg_no" class="form-control" id="acadmic_attendance_reg_no">
				        						</div>
				        						<div class="col-md-4 col-sm-6 col-xs-6 error-di">
						        					<label class="">Remark <strong class="text-danger">*</strong></label>
						        					<textarea class="form-control" name="acadmic_remark" id="acadmic_remark">
						        					</textarea>
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
													<label class="required">Address Line</label> {{-- <span class="text-muted">(HouseNo./GaliNo./Area/Colony/Near by/)</span> --}}
													<input type="text" class="form-control" name="p_address" id="p_address">
												</div>
												<div class="col-md-4 error-di">
													<label class="required">Country Name</label>
													<select name="p_country_id" class="form-control" id="p_country_id">
													<option value="">Select County</option>	
													@foreach($country as $countries)
														<option value="{{$countries->id}}" >{{$countries->country_name}}</option>
													@endforeach
													</select>
												</div>
												<div class="col-md-4 error-di">
													<label class="required">State Name</label>
													<select name="p_state_id" class="form-control" id="p_state_id">

													</select>
												</div>

												</div>
												<div class="row">
												<div class="col-md-4 error-di">
													<label class="required">City Name</label>
													<select name="p_city_id" class="form-control" id="p_city_id" >
														
													</select>
												</div>
												<div class="col-md-4 error-di">
													<label class="required">Zip Code</label>
													<input type="text" name="p_zip_code" class="form-control" id="p_zip_code">
												</div>
											</div>
										</div>
									</div>

									<div class="panel panel-default">
										<div class="panel-heading">
											<h1 class="panel-title">Local Address:</h1>
										</div>
										<div class="panel-body">
											<div class="row form-group">
												<div class="col-md-12 ">
													<label>
														<input type="checkbox" name="same_as" id="p_l_same">
													</label>
													<label>Same as Permanent Address</label><span class="text-muted">(Click to copy permanent address data)</span>
													
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-4 error-di">
													<label class="required">Address Line</label> {{-- <span class="text-muted">(HouseNo./GaliNo./Area/Colony/Near by)</span> --}}
													<input type="text" class="form-control" name="l_address" id="l_address">
												</div>
												<div class="col-md-4 error-di">
													<label class="required">Country Name</label>
													<select name="l_country_id" class="form-control" id="l_country_id">
													<option value="">Select County</option>	

													@foreach($country as $countries)
														<option value="{{$countries->id}}" >{{$countries->country_name}}</option>
													@endforeach
													</select>
												</div>
												<div class="col-md-4 error-di">
													<label class="required">State Name</label>
													<select name="l_state_id" class="form-control" id="l_state_id">

													</select>
												</div>

												</div>
												<div class="row">
												<div class="col-md-4 error-di">
													<label class="required">City Name</label>
													<select name="l_city_id" class="form-control" id="l_city_id" >
														
													</select>
												</div>
												<div class="col-md-4 error-di">
													<label class="required">Zip Code</label>
													<input type="text" name="l_zip_code" class="form-control" id="l_zip_code">
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
						        	<section>
						        	<div class="row form-group">
						        		<div class="col-md-6 col-sm-6 col-xs-6 error-div">
						        			<label>Bank Name</label>
						        			<input type="text" name="bank_name" class="form-control"> 
						        			@error('bank_name')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror

						        		</div>
						        		<div class="col-md-6 col-sm-6 col-xs-6 error-div">
						        			<label>Branch</label>
						        			<input type="text" name="bank_branch" class="form-control">
						        			@error('bank_branch')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
						        		</div>

						        	</div>
						        	<div class="row form-group">
						        		<div class="col-md-4 col-sm-6 col-xs-6 error-div">
						        			<label>Account Name</label>
						        			<input type="text" name="account_name" class="form-control">
						        			@error('account_name')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
						        		</div>
						        		<div class="col-md-4 col-sm-6 col-xs-6 error-div">
						        			<label>Account Number</label>
						        			<input type="text" name="account_no" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
						        			@error('account_no')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
						        		</div>
						        		<div class="col-md-4 col-sm-6 col-xs-6 error-div">
						        			<label>IFSC CODE</label>
						        			<input type="text" name="ifsc_code" class="form-control" id="ifsc_code" >
						        			@error('ifsc_code')
												<span class="text-danger">
													<strong>{{$message}}</strong>
												</span>
											@enderror
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
                                <input type="hidden" name="studentid" id="studentid" value="">
	                                <div class="card">
                                          <table border="0" style="" id="student_doc">
                                            <thead>
                                               <tr style="background-color: #e3f2fd;">
                                                  {{-- <th rowspan="2">ID</th> --}}
                                                  <th>SNo.</th>
                                                  <th > Document Title  </th>
                                                  <th > Document Description </th>
                                                  <th > File </th>
                                                  <th >Add More</th>
                                               </tr>
                                             </thead>
                                             <tbody>
                                              <tr id="1">
                                                <td id="sr_no">1</td>
                                                  <td> 
                                                     <input id="doc_title" name="doc_title[]" class="form-control" type="text" placeholder="Enter doc title" value="{{ old('doc_title[]') }}" >
                                                      @error('doc_title')
                                                      <span class="text-danger" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                      </span>
                                                      @enderror
                                                  </td>
                                                  <td> 
                                                     <textarea id="doc_description" name="doc_description[]" class="form-control doc_description" placeholder="Enter doc description" value="{{ old('doc_description[]') }}"></textarea> 
                                                  </td>
                                                  <td> 
                                                    <input id="file_name" name="student_doc[]" class="form-control" type="file" placeholder="file" value="{{ old('student_doc[]') }}" >
                                                  @error('student_doc')
                                                    <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                  @enderror
                                                  </td>
                                                  <td>
                                                  	<button type="button" name="add_more_std_doc" id="add_more_std_doc" class="btn btn-success btn-xs">+</button>
                                                  </td>
                                                   <div class="form-group col-md-12 mt-5" align="left" >
                                                      
                                                  </div>
                                               </tr>
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
				    @csrf
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
@if($message = Session::get('success'))
	<script >
	$(document).ready(function(){	
		swal({
          text: "{{$message}}",
          icon : 'success',
        });
       });
	</script>	
@endif


<script type="text/javascript">

// For tabing ..........	
  $(document).ready(function() {
  $('.btnNext').click(function() {
    $('.nav-tabs .active').parent().next('li').find('a').trigger('click');
  });

  $('.btnPrevious').click(function() {
    $('.nav-tabs .active').parent().prev('li').find('a').trigger('click');
  });
});



$(function () {
	$(".datepicker").datepicker({ 
		singleDatePicker: true,
		showDropdowns: true,
	});
});

$('label.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');
$('th.required').append('&nbsp;<strong class="text-danger">*</strong>&nbsp;');

var form = $("#example-form");

// form.validate({   
//     rules: {
//     	f_name:{
//     		letterswithbasicpunc:true,
//     		minlength:3,
//     		maxlength:30,
//     	},
//     	m_name:{
//     		letterswithbasicpunc:true,
//     		minlength:3,
//     		maxlength:30,
//     	},
//     	l_name:{
//     		letterswithbasicpunc:true,
//     		minlength:3,
//     		maxlength:30,
//     	},
//     	roll_no:{
//     		minlength:7,
//     		maxlength:10,
//     	},
//     	enroll_no:{
//     		minlength:7,
//     		maxlength:10,
//     	},

// 		s_mobile:{
// 			minlength:10,
// 			maxlength:11,
// 		},
// 		dob:{
// 			datebefore:true,
// 		},
// 		email:{
// 			email:true,
// 			uniqueCheck: true,
// 		},
// 		spec_ailment:{
// 			minlength:5,
// 			maxlength:100,
// 		},
// 		taluka:{
// 			letterswithbasicpunc:true,
// 			minlength:3,
// 			maxlength:85,
// 		},
// 		age:{
// 			minlength:2,
// 			maxlength:2,
// 		},		
// 		s_ssmid:{
// 			minlength:9,
// 			maxlength:9,
// 		},
// 		f_ssmid:{
// 			minlength:8,
// 			maxlength:8,
// 		},
// 		aadhar_card:{
// 			minlength:12,
// 			maxlength:12,
// 		},
// 		account_no:{
// 			minlength:10,
// 			maxlength:19,
// 		},
// 		ifsc_code:{
// 			ifsc:true,
// 		},
// 		g_mobile:{
// 			minlength:10,
// 			maxlength:11,
// 		},
// 		'qual_name[]':{
// 			qual:true,
// 		},
// 		'qual_clg[]':{
// 			qual:true,
// 		},
// 		'qual_board[]':{
// 			qual:true,
// 		},
// 		'qual_marks[]':{
// 			qual:true,						
// 		},
// 		'qual_years[]':{
// 			qual:true,
// 		},
// 		'qual_division[]':{
// 			qual:true,
// 		},
// 		'g_name[]':{
// 			guardian:true,
// 		}, 
// 		'relation[]':{
// 			guardian:true,
// 		}, 
// 		'g_mobile[]':{
// 			guardian:true,
// 		},
// 		'address[]':{
// 			stud_addr:true,
// 		},
// 		'zip_code[]':{
// 			stud_addr:true,
// 		},
// 		'state_code[]':{
// 			stud_addr:true,
// 		},
// 		'city_code[]':{
// 			stud_addr:true,
// 		},
// 		'g_photo[]':{
// 			guard_photo:true,
// 		},
// 		'doc_url[]':{
// 			docs_image:true,
// 		},
// 		passout_date:{
// 			greaterthan:true,
// 		}

//     },
// 	errorElement: "em",
// 	errorPlacement: function errorPlacement(error, element) { 
// 		element.after(error);
// 		error.addClass( "help-block" );

// 	 },
// 	highlight: function ( element, errorClass, validClass ) {
// 		$( element ).parents( ".error-div" ).addClass( "has-error" ).removeClass( "has-success" );
// 	},
// 	unhighlight: function (element, errorClass, validClass) {
// 		$( element ).parents( ".error-div" ).addClass( "has-success" ).removeClass( "has-error" );
// 	}
// });

// form.children("div").steps({
//     headerTag: "h3",
//     bodyTag: "section",
//     transitionEffect: "slideLeft",
//     onStepChanging: function (event, currentIndex, newIndex)
//     {
//         form.validate().settings.ignore = ":disabled,:hidden";
//         return form.valid();
//     },
//     onFinishing: function (event, currentIndex)
//     {
//         form.validate().settings.ignore = ":disabled";
//         return form.valid();
//     },
//     onFinished: function (event, currentIndex)
//     {
//         form.submit();
//     }
// });
$(document).ready(function(){
	$('.status').on('change',function(e){
		e.preventDefault();
		var status = $(this).val();
		// console.log(status);
		if(status == 'P'){
			$('.passout_date').show();
		}else{
			$('.passout_date').hide();
		}
	});
	

	$('#qual_catg').on('change',function(e){
		e.preventDefault();
		var qual_catg_code = $(this).val();
		qual_course(qual_catg_code);
		qual_docs(qual_catg_code);
	});

	// $('#p_l_same').on('change',function(){

	// 	var check = $("[name='same_as']:checked").val();
	// 	if(check == 'on'){
	// 		var address = $('#l_address').val();
	// 		var zip_code = $('#l_zip_code').val();

	// 		var country_code = $('#l_country_id').val();
	// 		var state_code = $('#l_state_id').val();
	// 		var city_code = $('#l_city_id').val();			
	// 		var state_id = '#state1';
	// 		var city_id = '#city1';

	// 		// state_fetch(country_code,state_id,state_code);
	// 		city_fetch(state_code,city_code,city_id);

	// 		$('#l_address').val(address);
	// 		$('#l_address').attr('readonly','true');
	// 		$('#l_zip_code').attr('readonly','true');
	// 		$('#l_state_id').attr('readonly','true');
	// 		$('#l_city_id').attr('readonly','true');
	// 		$('#l_country_id').attr('readonly','true');
	// 		$('#l_zip_code').val(zip_code);
	// 	}else{
	// 		$('#address1').val('');
	// 		$('#zip_code1').val('');
	// 		$('#state1').val('');
	// 		var state_code = '';
	// 		var city_code = '';
	// 		var city_id = '#city1';
	// 		city_fetch(state_code,city_code,city_id);

	// 		$('#address1').removeAttr('readonly');
	// 		$('#zip_code1').removeAttr('readonly');
	// 		$('#state1').removeAttr('readonly');
	// 		$('#city1').removeAttr('readonly');
	// 		$('#country1').removeAttr('readonly');
	// 	}
	// });


	var country_code = $('#country').val();
	var state_code = '';
	var state_id = '#state';
	// state_fetch(country_code,state_id,state_code);

	$('#country').on('change',function(e){
		e.preventDefault();
		var country_code = $(this).val();
		var state_id = '#state';
		var state_code = '';
		// state_fetch(country_code,state_id,state_code);
	});

	var country_code1 = $('#country1').val();
	var state_id1 = '#state1';
	// state_fetch(country_code1,state_id1);

	$('#country1').on('change',function(e){
		e.preventDefault();
		var country_code = $(this).val();
		var state_id = '#state1'
		state_fetch(country_code,state_id);
	});

	// var state_code = $('#state').val();
	// state(state_code,city_code);

	$('#state').on('change',function(e){
		e.preventDefault();
		var state_code = $(this).val();
		var city_code = '';	
		var city_id = '#city';
		city_fetch(state_code,city_code,city_id);
	});

	$('#state1').on('change',function(e){
		e.preventDefault();
		var state_code = $(this).val();
		var city_code = '';	
		var city_id = '#city1';
		city_fetch(state_code,city_code,city_id);
	});

	var i = 0;
	$('#qual_field').append('<tr id="row'+i+'"><td class="error-di"><input type="text" name="prev_school[]" class="form-control"></td><td class="error-di"><input type="text" name="qual_clg[]" class="form-control"></td><td class="error-di"><input type="text" name="qual_board[]" class="form-control"></td><td class="error-di"><input type="text" name="qual_marks[]" class="form-control"></td><td class="error-di"><input type="text" name="qual_years[]" class="form-control" ></td><td class="error-di"><select class="form-control" name="qual_division[]"><option value="">Select Division</option><option value="1">1st</option><option value="2">2nd</option><option value="3">3rd</option></select></td><td><a class="btn btn-sm btn-success" id="add_row"><i class="fa fa-plus"></i></a></td></tr>');
	i++;
	 $('#add_row').click(function(){
	 	$('#qual_field').append('<tr id="row'+i+'"><td class="error-di"><input type="text" name="qual_name[]" class="form-control"></td><td class="error-di"><input type="text" name="qual_clg[]"  class="form-control"></td><td class="error-di"><input type="text" name="qual_board[]" class="form-control"></td><td class="error-di"><input type="text" name="qual_marks[]" class="form-control"></td><td class="error-di"><input type="text" name="qual_years[]" class="form-control"></td><td class="error-di"><select class="form-control" name="qual_division[]"><option value="">Select Division</option><option value="1">1st</option><option value="2">2nd</option><option value="3">3rd</option></select></td><td><a class="btn btn-sm btn-danger btn_remove1" id="'+i+'"><i class="fa fa-minus"></i></a></td></tr>');
	 	i++;
	 });

	$(document).on('click', '.btn_remove1', function(){
		var button_id = $(this).attr("id");
		//alert(button_id); 
		$('#row'+button_id+'').remove();
	});
	/*$.validator.addMethod('greaterthan',function(value,element){
		var status = $('.status').val();
	
		if(status == 'P'){
			var addm_date =new Date($('.addm_date').val());
			var passout_date = new Date(value);
			if(passout_date.getFullYear() > addm_date.getFullYear()){
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
		

	},"Passout year is greater than addmission date");

	$.validator.addMethod('uniqueCheck',function(value,element){
		 var flag = true;
		if(value != null){
			unique_email_check(value);
			var check = $('#email_check').val();
			if(check == ''){
				return true;
			}
			// console.log(flag);
			// console.log(flag.length);
		}		

	},"Email Address Must be unique.");*/




	/*$.validator.addMethod('datebefore',function(value,element){
		var c_d = new Date();
		year = c_d.getFullYear() - 8;
		date = new Date(value);

		age = Math.floor((c_d.getTime() - date.getTime()) / (365.25 * 24 * 60 * 60 * 1000));
		$('.age').val(age).attr('readonly','true');
		if(date.getFullYear() < year){
			return true;
		}
		else{
			return false;
		}


	},"date of birth before than 8 years ago");

	$.validator.addMethod("qual", function (value, element) {
        var flag = true;
       
      	$("[name^=qual_name], [name^=qual_clg],[name^=qual_board],[name^=qual_division]").each(function (i, j) {

      		$(this).parent('.error-di').find('em.error').remove();
      		$(this).parent('.error-di').removeClass("has-error");
            if ($.trim($(this).val()) == '') {
                flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">This field is required.</em>');             
            }
            else{
            	$(this).parent('.error-di').addClass( "has-success" ).removeClass( "has-error" );
            }
      		
        });

      	$("[name^=qual_marks]").each(function(i,j){
      		$(this).parent('.error-di').find('em.error').remove();
      		$(this).parent('.error-di').removeClass("has-error");
      		var test = /^\d{0,2}(\.\d{0,2})?$/;
      		var marks = $.trim($(this).val());
      		if (marks == '') {
      			flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">This field is required.</em>');   

      		}else if(!test.test(marks)){
      			flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">The specified marks is invalid.</em>');    
      		}
      		else{
            	$(this).parent('.error-di').addClass( "has-success" ).removeClass( "has-error" );
            }

      	});

      	$("[name^=qual_years]").each(function(i,j){
      		var  year = $.trim($(this).val());
      		var curr_year = (new Date()).getFullYear();
      		 var text = /^[0-9]+$/;
      		
      		$(this).parent('.error-di').find('em.error').remove();
      		$(this).parent('.error-di').removeClass("has-error");

      		if (year == '') {
      			flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">This field is required.</em>');   

      		}else if(year.length != 4 || !text.test(year)){
      			flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">The specified year is invalid.</em>');    
      		}
      		else if(year < '1920' || year > curr_year){
      			flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">Year should be in range 1920 to current year.</em>');  
      		}
      		else{
            	$(this).parent('.error-di').addClass( "has-success" ).removeClass( "has-error" );
            }

      	});
     
        return flag;


    }, "");
*/


	var k =0;

	var html_div ='<div class="form-group row relation"><div class="col-sm-6 col-md-4 col-xs-6 error-di"><label >Relation <strong class="text-danger">*</strong></label><select name="relation[]" class="form-control "><option value="">Select Relation</option>@foreach($studentReligions as $key =>$studentReligion)<option value="{{$studentReligion->id}}">{{$studentReligion->religion_name}}</option>@endforeach ></select></div><div class="col-md-4 col-sm-6 col-xs-6 error-di"><label class="">Name <strong class="text-danger">*</strong></label><input type="text" name="g_name[]" class="form-control "></div><div class="col-md-4 col-sm-6 col-xs-6 error-di"><label class="required">Mobile <strong class="text-danger">*</strong></label><input type="text" name="g_mobile[]" class="form-control "></div></div><div class="row form-group"><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label class="">Work Status</label><select name="work_status[]" class="form-control"><option value="">Select Work Status</option><option value="0">Self Employed</option><option value="1">Job</option><option value="3">Retired</option></select></div><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label class="">Employment Type</label><select name="employment_type[]" class="form-control"><option value="">Select Employment Type</option><option value="0">Government</option><option value="1">Private</option></select></div><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label class="">Professtion Type</label><select name="profession_status[]" class="form-control"><option value="">Select Profession type</option>">@foreach($professtionType as $key =>$professtionTypes)<option value="{{$professtionTypes->id}}">{{$professtionTypes->professtion_types_name}}</option>@endforeach ></select></div></div><div class="form-group row"><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Employer</label><input type="text" name="employer[]" class="form-control"></div><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label>Designation</label><select class="form-control" name="designation_id[]"><option value="">Select Designation Name</option> @foreach($guardianDesignation as $key =>$guardianDesignations)<option value="{{$guardianDesignations->id}}">{{$guardianDesignations->guardian_designations_name}}</option>@endforeach </option></select></div><div class="col-md-4 col-xs-6 col-sm-6 error-di"><label >Photo</label><input type="file" name="g_photo[]" id="g_photo" accept="image/*"><input type="hidden" name="g_check[]" class="g_photo" value=""><input type="hidden" name="g_id[]" value=""></div><hr></div>';


	$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_guar"><i class="fa fa-plus"></i> Add More</a></div>'+html_div+'</div>');
			        		
	k++;
    $('#add_guar').click(function(e){
    	e.preventDefault();
    	$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="'+k+'"><i class="fa fa-minus"></i></a></div>'+html_div+'</div>');
    	k++;
    });
    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		//alert(button_id); 
		$('#row'+button_id+'').remove();
	});

  /*  $.validator.addMethod("guardian", function (value, element) {
        var flag = true;  
        $('[name^=relation]').each(function(i,j){
        	$(this).parent('.error-di').find('em.error').remove();
      		$(this).parent('.error-di').removeClass("has-error");
      		 var parent_id = $(this).parent().parent().parent().attr('id');
      		 var relation_id = $.trim($(this).val());
      		
            if ($.trim($(this).val()) == '') {
                flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">This field is required.</em>');             
            }
            else{
				$('[name^=relation]').each(function(i,j){
					var parent_id1 = $(this).parent().parent().parent().attr('id');
					var relation_id1 = $.trim($(this).val());

					if(parent_id1 != parent_id){						
						if(relation_id == relation_id1){
							$(this).parent('.error-di').find('em.error').remove();
      						$(this).parent('.error-di').removeClass("has-error");
	
							flag = false;   

							 $("#"+parent_id+" :nth-child(2) :first").addClass('has-error').removeClass('has-success');
							 $("#"+parent_id+" :nth-child(2) :first").append('<em class="error help-block">This relation is define previous.</em>');  
						}
						
					}

				});
            }
      		
        });

		$('[name^=g_name]').each(function(i,j){
			$(this).parent('.error-di').find('em.error').remove();
      		$(this).parent('.error-di').removeClass("has-error");
			var name = $.trim($(this).val());
			if ($.trim($(this).val()) == '') {
                flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">This field is required.</em>');             
            }
			else if ($.trim($(this).val()) != '') {
				if(name.length > 100){				
					flag = false;           
	               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
	               	$(this).parent('.error-di').append('<em class="error help-block">Please enter no more than 100 characters.</em>');             
				}else{
					$(this).parent('.error-di').addClass( "has-success" ).removeClass( "has-error" );
				}
			}
		});

        $('[name^=g_mobile]').each(function(i,j){
        	var g_mobile = $.trim($(this).val());
        	$(this).parent('.error-di').find('em.error').remove();
      		$(this).parent('.error-di').removeClass("has-error");
            if ($.trim($(this).val()) == '') {
                flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">This field is required.</em>');             
            }
            else if(!$.isNumeric(g_mobile) || g_mobile.length < 10 || g_mobile.length > 11){
            	flag = false;           
               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
               	$(this).parent('.error-di').append('<em class="error help-block">The specified mobile number is invalid..</em>');     
            }
            else{
            	$(this).parent('.error-di').addClass( "has-success" ).removeClass( "has-error" );
            }
      		
        });
       
        return flag;

    },"");*/

    // $.validator.addMethod("stud_addr", function (value, element) {
    //     var flag = true;
    //     $('[name^=address],[name^=state_code],[name^=city_code]').each(function(i,j){
    //     	$(this).parent('.error-di').find('em.error').remove();
    //   		$(this).parent('.error-di').removeClass("has-error");
    //         if ($.trim($(this).val()) == '') {
    //             flag = false;           
    //            	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
    //            	$(this).parent('.error-di').append('<em class="error help-block">This field is required.</em>');             
    //         }
    //         else{
    //         	$(this).parent('.error-di').addClass( "has-success" ).removeClass( "has-error" );
    //         }
      		
    //     });
    //     $('[name^=zip_code]').each(function(i,j){
    //     	var zip_code = $.trim($(this).val());
    //     	var test = /^[0-9]+$/;
        	

    //     	$(this).parent('.error-di').find('em.error').remove();
    //   		$(this).parent('.error-di').removeClass("has-error");

    //         if ($.trim($(this).val()) == '') {
    //             flag = false;           
    //            	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
    //            	$(this).parent('.error-di').append('<em class="error help-block">This field is required.</em>');             
    //         }
    //         else if((zip_code.length)< 6 || (zip_code.length)>6){
    //         	flag = false;           
    //            	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
    //            	$(this).parent('.error-di').append('<em class="error help-block">zipcode should only be 6 digits.</em>');     
    //         }else if(!test.test(zip_code)){
    //         	flag = false;           
    //            	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
    //            	$(this).parent('.error-di').append('<em class="error help-block">zipcode should be numbers only.</em>');   
    //         }

    //         else{
    //         	$(this).parent('.error-di').addClass( "has-success" ).removeClass( "has-error" );
    //         }
      		
    //     });
    //     return flag;

    // },"");

    // $.validator.addMethod("guard_photo", function (value, element) {
    //     var flag = true;
    //     $('[name^=g_photo]').each(function(i,j){
    //     	if ($.trim($(this).val()) != '') {
    //     		$(this).parent('.error-di').find('.g_photo').val('1');
    //     	}else{
    //     		$(this).parent('.error-di').find('.g_photo').val('0');
    //     	}
    //     });
    //     return flag;
    // },"");

	$.validator.addMethod("docs_image", function (value, element) {
	    var flag = true;
	    $('[name^=doc_url]').each(function(i,j){
	    	if ($.trim($(this).val()) != '') {
	    		$(this).parent('.error-di').find('.doc_url').val('1');
	    	}else{
	    		$(this).parent('.error-di').find('.doc_url').val('0');
	    	}
	    });
	    return flag;
	},"");



});

</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="https://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script type="text/javascript">
  
   $.validator.addMethod("mobile_regex", function(value, element) {
    return this.optional(element) || /^\d{10}$/i.test(value);
    }, "Please Enter No Only.");
    
    $.validator.addMethod("password_regex", function(value, element) {
    return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/i.test(value);
    }, "Password must contain at least 1 lowercase, 1 uppercase, 1 numeric and 1 special character");
    
    $.validator.addMethod("email_regex", function(value, element) {
    return this.optional(element) || /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/i.test(value);
    }, "The Email Address Is Not Valid Or In The Wrong Format");
    
    $.validator.addMethod("name_regex", function(value, element) {
    return this.optional(element) || /^[a-zA-Z ]{2,100}$/i.test(value);
    }, "Please choose a name with only a-z 0-9.");
    
    /*$("#example-form").validate({
       errorElement: 'required',
        errorClass: 'help-inline',
      
      rules: {
	     
    	username:{
    		letterswithbasicpunc:true,
    		minlength:3,
    		maxlength:30,
    	}, 
    	password_regex:{
    		letterswithbasicpunc:true,
    		minlength:3,
    		maxlength:30,
    	},
    	f_name:{
    		letterswithbasicpunc:true,
    		minlength:3,
    		maxlength:30,
    	},
    	m_name:{
    		required:true,
    	},
    	l_name:{
    		required:true,
    	},
    	roll_no:{
    		required:true,
    	},

    	enroll_no:{
    		required:true,
    	},
    	s_mobile:{
			required: true,
	        digits: true,
	        minlength: 10,
	        maxlength: 10,
		},
		dob:{
			datebefore:true,
		},
		email:{
			email:true,
			uniqueCheck: true,
		},
		prev_school:{
			required:true,
		},
		year_of_prev_school:{
			required:true,
		},
		acadmic_remark:{
			required:true,
		},
		p_address:{
			required:true,
		},
		p_country_code:{
			required:true,
		},
		p_state_code:{
			required:true,
		},
		p_city_code:{
			required:true,
		},
		p_zip_code:{
			required:true,
		},
		l_address:{
			required:true,
		},
		l_country_code:{
			required:true,
		},
		l_state_code:{
			required:true,
		},
		l_city_code:{
			required:true,
		},
		l_zip_code:{
			required:true,
		},
		std_class:{
			required:true,
		},
		batch_id:{
			required:true,
		},
		section:{
			required:true,
		},
		admision_no:{
			required:true,
		},
		addm_date:{
			required:true,
		},
		
    },
     
  
    messages: {
     f_name: {
      required: "Please enter first name",
     },
     m_name: {
      required: "Please enter middle name",
     },
     l_name: {
      required: "Please enter last name",
     },     
     std_class: {
      required: "Please select class",
     },
     batch_id: {
      required: "Please select batch",
     },
     section: {
      required: "Please select section",
     },
     admision_no: {
      required: "Please enter asmision no",
     },
     addm_date: {
      required: "Please select admintion date",
     },
     roll_no: {
      required: "Please enter class roll no",
     },
     birth_place: {
      required: "Please enter birth place",
     },
     gender: {
      required: "Please select gender",
     },
     reservation_class_id: {
      required: "Please select cast category",
     },      
     s_mobile: {
      required: "Please enter phone number",
      digits: "Please enter valid phone number",
      minlength: "Phone number field accept only 10 digits",
      maxlength: "Phone number field accept only 10 digits",
     },     
     email: {
      required: "Please enter email address",
      email: "Please enter a valid email address.",
     },
     username: {
      required: "Please enter user name",
     },
     password: {
      required: "Please enter password",
     },
    },
      submitHandler: function(form) {
      form.submit();
      }
 });*/

// get State when select country code..........................
$('#p_country_id').on('change',function(){
 var country_id = $(this).val();
	 if(country_id !='' ){
		$.ajax({
			type:'POST',

			url: "{{route('get_p_state')}}",
			data: {country_id:country_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				// $('#p_state_id').empty().html(res);
				$("#p_state_id").empty();
                $("#p_state_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		$("#p_state_id").append('<option value="'+value.id+'">'+value.state_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select city field');
	}
	});
$('#p_state_id').on('change',function(){
 var state_id = $(this).val();
	 if(state_id !='' ){
		$.ajax({
			type:'POST',

			url: "{{route('get_p_city')}}",
			data: {state_id:state_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				// $('#p_state_id').empty().html(res);
				$("#p_city_id").empty();
                $("#p_city_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		$("#p_city_id").append('<option value="'+value.id+'">'+value.city_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select state field');
	}
	});

// get State city when select country code..........................
$('#l_country_id').on('change',function(){
 var country_id = $(this).val();
	 if(country_id !='' ){
		$.ajax({
			type:'POST',

			url: "{{route('get_p_state')}}",
			data: {country_id:country_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				// $('#p_state_id').empty().html(res);
				$("#l_state_id").empty();
                $("#l_state_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		$("#l_state_id").append('<option value="'+value.id+'">'+value.state_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select city field');
	}
	});

$('#l_state_id').on('change',function(){
 var state_id = $(this).val();
	 if(state_id !='' ){
		$.ajax({
			type:'POST',
			url: "{{route('get_p_city')}}",
			data: {state_id:state_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				// $('#p_state_id').empty().html(res);
				$("#l_city_id").empty();
                $("#l_city_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		$("#l_city_id").append('<option value="'+value.id+'">'+value.city_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select state field');
	}
	});

// get State and country when select country code..........................
$('#acadmic_city_id').on('change',function(){
 var state_id = $(this).val();
	 if(state_id !='' ){
		$.ajax({
			type:'POST',

			url: "{{route('get_academic_state')}}",
			data: {state_id:state_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				// $('#p_state_id').empty().html(res);
				$("#acadmic_state_id").empty();
                $("#acadmic_state_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		$("#acadmic_state_id").append('<option value="'+value.country_id+'">'+value.state_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select state field');
	}
	});

$('#acadmic_state_id').on('change',function(){
 var country_id = $(this).val();
	 if(country_id !='' ){
		$.ajax({
			type:'POST',
			url: "{{route('get_academic_country')}}",
			data: {country_id:country_id, "_token": "{{ csrf_token() }}",},
			success:function(res){
				// $('#p_state_id').empty().html(res);
				$("#acadmic_country_id").empty();
                $("#acadmic_country_id").append('<option>Select</option>');
                $.each(res,function(key,value){
            		$("#acadmic_country_id").append('<option value="'+value.id+'">'+value.country_name+'</option>');
        		});
			}
		});
	}else{
		alert('please select country field');
	}
	});


/* add table row For local tour amount bill..................................*/
    $(document).ready(function(){
     var count = 1;
     $(document).on('click', '#add_more_std_doc', function(){
       count++;
       var html_code = '';
       html_code += '<tr id="'+count+'">';
       html_code += '<td><span id="sr_no">'+count+'</span></td>';
       html_code += '<td><input type="text" name="doc_title[]" id="doc_title'+count+'" data-srno="'+count+'" class="form-control input-sm timepicker"  placeholder="Enter doc titleti"/></td>';
       html_code += '<td ><textarea name="doc_description[]"  id="doc_description'+count+'" data-srno="'+count+'" class="form-control input-sm"  placeholder="Enter mode of Conveyance"/></textarea></td>';
        html_code += '<td><input type="file" name="student_doc[]" id="file_name'+count+'" data-srno="'+count+'" class="form-control input-sm"/></td>';

       html_code += '<td><button type="button" name="add_more_std_doc" id="'+count+'" class="btn btn-danger btn-xs add_more_std_doc">X</button></td>';
       html_code += '</tr>';
       $('#student_doc').append(html_code);
    
    });
    });

 	$(document).on('click', '.add_more_std_doc', function(){
       var row_id = $(this).attr("id");

       $('#'+row_id).remove();
     });
</script>

 @endsection
