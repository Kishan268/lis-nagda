@extends('layouts.main')
@section('content')

<style type="text/css">
	.text-danger{
		font-size: 12px;
	}
</style>

<div class="container">

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			@include('admin.students.header')
		</div>
	</div>
	<div class="row mb-4">
		<div class="col-md-12 col-sm-12 col-lg-12">
			 <div class="card">
		        <div class="card-header">
	         		<h6 class="card-title">Add Student</h6>
	          	</div>
	          	<div class="card-body">
	          		<div class="row ">
	          			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
	 						<div class="tabs">
	 							<ul class="nav nav-tabs tab-links">
									<li class="nav-item active">
								    	<a class="nav-link active" href="#basic_details">Basic Details</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#academic_dtl" >Academic Details</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#guardian_info" >Guardian Info</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#student_address" >Student Address</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#bank_details">Bank Details</a>
									</li>
									<li class="nav-item"> 
								    	<a class="nav-link" href="#student_document" >Student Document</a>
									</li>
								</ul>
	          		
		          				<form action="{{route('student_detail.store')}}" method="post" enctype="multipart/form-data" autocomplete="off">
		          					@csrf
		          					<div class="tab-content mt-4 p-2" style="font-size: 15px !important; background-color: whitesmoke !important;" >
										<div class="tab-pane tab  active" id="basic_details" >
											<section>
									        	<h3 class="mb-3">Basic Details</h3>
									        	<hr/>
										        <div class="row form-group">
													<div class="col-md-12">
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
													<div class="col-md-3 col-xs-6 col-sm-6">
														<label for="std_class" class="required">Class</label>
														<select class="form-control required" name="std_class_id" id="std_class_id" required="required">
															<option value="">Select Class</option>
															@foreach($classes as $class)
																<option value="{{$class->id}}" {{old('std_class_id') == $class->id ? 'selected' : ''}}>{{$class->class_name}}</option>
															@endforeach
														</select>
														@error('std_class_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-xs-6 col-sm-6">
														<label class="required"> Batch</label>
														<select class="form-control required" name="batch_id" required="required">
															<option value="">Select Batch</option>
															@foreach($batches as $batch)
																<option value="{{$batch->id}}" {{old('batch_id') == $batch->id ? 'selected' : ''}}>{{$batch->batch_name}}</option>
															@endforeach
														</select>
														@error('batch_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-xs-6 col-sm-6">
														<label class="required">Section</label>
														<select class="form-control required" name="section_id" id="section_id" required="required">
															<option value="">Select Section</option>

															@foreach($sections as $section)
																<option value="{{$section->id}}" {{old('section_id') == $section->id ? 'selected' : ''}}>{{$section->section_name}}</option>
															@endforeach
														</select>
														@error('section_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-xs-6 col-sm-6">
														<label class="required">Admision No</label>
														<input type="text" name="admision_no" class="form-control" value="{{old('admision_no')}}" required="required">
														@error('admision_no')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>											
												</div>
												<div class="row form-group">
													<div class="col-md-3 col-xs-6 col-sm-6">
														<label class="required">Admission Date</label>
														<input type="text" name="addm_date" class="form-control datepicker required addm_date"  data-date-format="yyyy-mm-dd"  value="{{old('addm_date')}}" placeholder="{{date('Y-m-d')}}" required="required">
														@error('addm_date')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
														
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label class="">Class Roll Number</label>
														<input type="text" name="roll_no" value="{{old('roll_no')}}" class="form-control" >
														@error('roll_no')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
														
													<div class="col-md-3 col-sm-6 col-xs-6 has-success">
														<label class="required">Student Status</label>
														<select class="form-control required status" name="status" aria-invalid="false" required="required">
															<option value="R" {{old('status') == 'R' ? 'selected' : ''}}>Running</option>
															<option value="P" {{old('status') == 'P' ? 'selected' : ''}}>Pass</option>
															<option value="F" {{old('status') == 'F' ? 'selected' : ''}}>Fail</option>
														</select>
													</div>
																								
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label class="required">First Name</label>
														<input type="text" name="f_name" id="f_name" value="{{old('f_name')}}" class="form-control required" required="required">
														@error('f_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>								
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label>Middle Name</label>
														<input type="text" name="m_name" id="m_name" value="{{old('m_name')}}" class="form-control">
														@error('m_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>									
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label class="required">Last Name</label>
														<input type="text" name="l_name" id="l_name" value="{{old('l_name')}}" class="form-control required" required="required">
														@error('l_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												
													<div class="col-md-3 col-sm-6 col-xs-6 passout_date" style="display: none;">
														<label class="required">Passout Date</label>
														<input type="text" name="passout_date" class="form-control datepicker " readonly="true" data-date-format="yyyy-mm-dd" value="{{old('passout_date')}}"  placeholder="{{date('Y-m-d')}}" required="required">
													</div>

													<div class="col-md-3 col-sm-6 col-xs-6">
														<label class="required">Mobile Number</label>
														<input type="text" name="s_mobile" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('s_mobile')}}" required="required"> 
														@error('s_mobile')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label class="required">Date of Birth</label>
														<input type="text" name="dob" class="form-control datepicker required" data-date-format="yyyy-mm-dd" placeholder="{{date('Y-m-d')}}" value="{{old('dob')}}" required="required">
														@error('dob')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label class="">Birth Place</label>
														<input type="text" name="birth_place" class="form-control birth_place required" placeholder="" id="birth_place" value="{{old('birth_place')}}">
														@error('birth_place')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label class="required">Email Address</label> <span class="text-muted"><span class="text-muted">must be unique</span>
														<input type="text" name="email" class="form-control required" value="{{old('email')}}"> 
														
														@error('email')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												</div>	
												<div class="row form-group">
													<div class="col-md-4 col-sm-6 col-xs-6">
														<label class="required">Gender</label>
														<select name="gender" class="form-control required" required="required">
															<option value="">Select Gender</option>
																@foreach(GENDER as $key =>$value)
																	<option value="{{$key}}" {{old('gender') == $key ? 'selected' : ''}}>{{$value}}</option>
																@endforeach
														</select>
														@error('gender')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-4 col-sm-6 col-xs-6">
														<label class="required">Cast Category</label>
														<select class="form-control required" name="reservation_class_id" required="required">
															<option value="">Select Category</option>
															@foreach(CASTCATEGORY as $key => $value)
																<option value="{{$key}}" {{old('reservation_class_id') == $key ? 'selected' : ''}}>{{$value}}</option>
															@endforeach
														</select>
														@error('reservation_class_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-4 col-sm-6 col-xs-6">
														<label>Religion</label>
														<select class="form-control" name="religion_id">
															<option value="">Select Religion</option>
															@foreach(RELIGION as $key => $value)
																	<option value="{{$key}}" {{old('religion_id;;') == $key ? 'selected' : ''}}>{{$value}}</option>
															@endforeach
														</select>
														@error('religion_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												</div>	
												<div class="row form-group">
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label>Blood Group</label>
														<select class="form-control" name="blood_id">
															<option value="">Select Blood Group</option>
															@foreach(BLOODGROUP as $key => $value)
																	<option value="{{$key}}" {{old('blood_id') == $key ? 'selected' : ''}}>{{$value}}</option>
															@endforeach
														</select>
														@error('blood_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label>Specific Ailment</label>
														<input type="text" name="spec_ailment" class="form-control" placeholder="Mole on nose. etc" value="{{old('spec_ailment')}}">
														@error('spec_ailment')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label>Age</label>
														<input type="text" value="{{old('age')}}" name="age" class="form-control age" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
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
																<option value="{{$studentNationalite->id}}" {{old('nationality_id') == $studentNationalite->id ? 'selected' : ''}}>{{$studentNationalite->nationality_name}}</option>
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
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label>Taluka(Tehsil)</label>
														<input type="text" name="taluka" value="{{old('taluk')}}" class="form-control">
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
														 	@foreach($studentMothertongues as $studentMothertongue)<option value="{{$studentMothertongue->id}}" {{old('language_id') == $studentMothertongue->id ? 'selected' : '' }}>{{$studentMothertongue->mothetongue_name}}</option>@endforeach >
														</select>
														@error('language_id')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label>Student SSMID</label>
														<input type="text" name="s_ssmid" value="{{old('s_ssmid')}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														@error('s_ssmid')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label>Family SSMID</label>
														<input type="text" name="f_ssmid" value="{{old('f_ssmid')}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														@error('f_ssmid')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												</div>
												<div class="form-group row">
													<div class="col-md-3 col-sm-6 col-xs-6">
														<label>Aadhar Card Number</label>
														<input type="text" name="aadhar_card" value="{{old('aadhar_card')}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
														@error('f_ssmid')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
													</div>
												</div>
												<div class="form-group mb-4">
													<div class="row" style="background: #4f5775;color: #fff; padding: 10px;border-radius: 10px;margin: 20px;">
                                         <div class="col-md-3">
                                              <label for="phone1" class="required">
                                             Student User Name
                                             </label>
                                             <input class="form-control required" id="username" value="{{old('username')}}" name="username" type="text" required="required">
                                             <spam id="usererror" style="color: red; display: none;"></spam>
                                         </div>
                                         
                                          <div class="col-md-3">
                                              <label for="phone1" class="required">
                                              Password
                                             </label>
                                             <input class="form-control required"  required="required" id="password" name="password" type="password">
                                         </div>
											               
			                              </div>
												</div>
												<div class="row form-group">
													<div class="col-md-3">
														<label for="rte" class="required"> Teacher Ward </label>
														<select class="form-control" name="teacher_ward" id="teacher_ward" required="required">
														    <option value="">Select</option>
														    <option value="1">Yes</option>
														    <option value="0">No</option>
														</select>
													</div>
													<div class="col-md-3">
														<label for="rte"> CBSE  Registration no </label>
														<input class="form-control" id="CBSC_reg" name="cbsc_reg" type="text">	           
													</div>			                                
												</div>
									        </section>
											<ul class="tab-links nav nav-tabs pull-right mt-3">
												<li class="nav-item">
													<a href="#next_tab2" class="nav-link btn btn-sm bg-success text-white nextButton">Next</a>
												</li>
											</ul>


									        {{-- <div class="input-group mb-3 group-end">
										      <a class="btn btn-success nextButton" href="#next_Basic_details">Next</a>
										    </div> --}}
			          					</div>
			          				<div class="tab-pane tab" id="academic_dtl">
									    	<h3 class="mb-3">Academic Details</h3>
									    	<hr>
										   <section>									        	
								        		<div class="form-group row relation">
								        			<div class="col-sm-4 col-md-4 col-xs-6 ">
								        				<label >Previous School (last studied)</label>
								        				<input type="text" name="prev_school" class="form-control " id="prev_school">
								        			</div>
								        			<div class="col-md-4 col-sm-6 col-xs-6 ">
								        				<label class=""> Year (left from Previous School)</label>
							        					<input type="text" name="year_of_prev_school" class="form-control " id="year_of_prev_school">
						        					</div>
					        						<div class="col-md-4 col-sm-6 col-xs-6 ">
							        					<label class="">Address 
							        					</label>
							        					<textarea class="form-control" name="address" id="acadmic_address"></textarea>
							        				</div>								        					
						        				</div>
						        				<div class="row form-group">
						        					<div class="col-md-4 col-xs-6 col-sm-6 ">
						        						<label class="">City</label>
						        						<input type="text" class="form-control" name="acadmic_city">

						        					</div>
						        					<div class="col-md-4 col-xs-6 col-sm-6 ">
						        						<label class="">State</label>
						        						<input type="text" class="form-control" name="acadmic_state">
						        						
						        					</div>
						        					<div class="col-md-4 col-xs-6 col-sm-6 ">
						        						<label class="">Pin Code</label>
						        						<input type="text" name="acadmic_pin" class="form-control" id="acadmic_pin">
					        						</div>
					        					</div>
					        					<div class="form-group row">
					        						<div class="col-md-4 col-xs-6 col-sm-6 ">
					        							<label>Country</label>
					        							<input type="text" class="form-control" name="acadmic_country">					
					        						</div>
					        						<div class="col-md-4 col-xs-6 col-sm-6 "><label>Cast</label>
					        							<input type="text" name="acadmic_cast" class="form-control" id="acadmic_cast">
					        						</div>
					        						<div class="col-md-4 col-xs-6 col-sm-6 ">
					        							<label> Attendance Reg. No (In device) </label>
					        							<input type="text" name="acadmic_attendance_reg_no" class="form-control" id="acadmic_attendance_reg_no">
					        						</div>
					        						<div class="col-md-4 col-sm-6 col-xs-6 ">
							        					<label class="">Remark </label>
							        					<textarea class="form-control" name="acadmic_remark" id="acadmic_remark">
							        					</textarea>
							        				</div>
					        							<hr>
				        						</div>
								    		</section>	
								    		<ul class="tab-links nav nav-tabs pull-right mt-3">
												<li class="nav-item">
													<a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
												</li>
												<li class="nav-item">
													<a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
												</li>
											</ul>									    	
									   </div>	   
									   <div class="tab-pane tab" id="guardian_info">
										    <h3 class="mb-3">Guardian Info</h3>
										    <hr>
										    <section>
										      <div class="row" >
										        	<div class="col-md-12 col-xl-12 col-sm-12" style="border:1px solid #eee9e9; " id="guard_info" >

										        	</div>
										      </div>
									        </section>
									        <ul class="tab-links nav nav-tabs pull-right mt-3">
													<li class="nav-item">
														<a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
													</li>
													<li class="nav-item">
														<a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
													</li>
												</ul>
									  	</div>   
									  	<div class="tab-pane tab" id="student_address">
									        <h3 class="mb-3">Student Address</h3>
									        <hr/>
									        <section>
								        			<div class="card">
														<div class="card-header">
															<h5 class="card-title">Permanent Address:</h5>
														</div>
														<div class="card-body">
															<div class="row form-group">
																	<div class="col-md-4 ">
																		<label class="required">Address Line</label> 
																		<input type="text" class="form-control" name="p_address" id="p_address">
																		@error('p_address')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>
																	<div class="col-md-4 ">
																		<label class="required">City Name</label>
																		<input type="text" class="form-control" id="p_city" name="p_city">
																		@error('p_city')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror		
																	</div>
																	
																	<div class="col-md-4 ">
																		<label class="required">State Name</label>
																		<input type="text" class="form-control" name="p_state" id="p_state">
																		@error('p_state')
																			<span class="text-danger">
																				<strong>{{$message}}</strong>
																			</span>
																		@enderror
																	</div>
															</div>
															<div class="row">		
																<div class="col-md-4 ">
																	<label class="required">Zip Code</label>
																	<input type="text" name="p_zip_code" class="form-control" id="p_zip_code">
																	@error('p_zip_code')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
																<div class="col-md-4 ">
																	<label class="required">Country Name</label>
																	<input type="text" class="form-control" name="p_country" id="p_country">
																	@error('p_country')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
															</div>
														</div>
													</div>
													<div class="card">
														<div class="card-header">
															<h5 class="card-title">Local Address:</h5>										
														</div>
														<div class="card-body">
															<div class="row form-group">
																<div class="col-md-12 ">
																	<label><input type="checkbox" name="same_as" id="p_l_same" />
																	</label>
																	<label>Same as Permanent Address</label><span class="text-muted">(Click to copy permanent address data)</span>
																</div>
															</div>
															<div class="row form-group">
																<div class="col-md-4 ">
																	<label class="required">Address Line</label>
																	<input type="text" class="form-control loc_addr" name="l_address" id="l_address">
																	@error('l_address')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>												
																<div class="col-md-4 ">
																	<label class="required">City Name</label>
																	<input type="text" class="form-control loc_addr" name="l_city" id="l_city">
																	@error('l_city')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>				
																<div class="col-md-4 ">
																	<label class="required">State Name</label>
																	<input type="text" class="form-control loc_addr" name="l_state" id="l_state">
																	@error('l_state')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>

															</div>
															<div class="row">
																<div class="col-md-4 ">
																	<label class="required">Zip Code</label>
																	<input type="text" name="l_zip_code" class="form-control loc_addr" id="l_zip_code">
																	@error('l_zip_code')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
																<div class="col-md-4 ">
																	<label class="required">Country Name</label>
																	<input type="text" class="form-control loc_addr" name="l_country" id="l_country">
																	@error('l_country')
																		<span class="text-danger">
																			<strong>{{$message}}</strong>
																		</span>
																	@enderror
																</div>
															</div>
														</div>
								        			</div>						       
							        			</section>
											   <ul class="tab-links nav nav-tabs pull-right mt-3">
													<li class="nav-item">
														<a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
													</li>
													<li class="nav-item">
														<a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
													</li>
												</ul>
									  	</div>
									  	<div class="tab-pane tab" id="bank_details">
											<h3 class="mb-3">Bank Details</h3>
											<hr>
							        		<section>
									        	<div class="row form-group">
									        		<div class="col-md-6 col-sm-6 col-xs-6">
									        			<label>Bank Name</label>
									        			<input type="text" name="bank_name" class="form-control"> 
									        			@error('bank_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror

									        		</div>
									        		<div class="col-md-6 col-sm-6 col-xs-6">
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
									        		<div class="col-md-4 col-sm-6 col-xs-6">
									        			<label>Account Name</label>
									        			<input type="text" name="account_name" class="form-control">
									        			@error('account_name')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
									        		</div>
									        		<div class="col-md-4 col-sm-6 col-xs-6">
									        			<label>Account Number</label>
									        			<input type="text" name="account_no" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
									        			@error('account_no')
															<span class="text-danger">
																<strong>{{$message}}</strong>
															</span>
														@enderror
									        		</div>
									        		<div class="col-md-4 col-sm-6 col-xs-6">
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
							        		<ul class="tab-links nav nav-tabs pull-right mt-3">
												<li class="nav-item">
													<a href="#back_tab1" class="nav-link btn btn-sm bg-primary text-white  prevButton">Prev</a>
												</li>
												<li class="nav-item">
													<a href="#next_tab2" class="nav-link btn btn-sm bg-success  text-white nextButton">Next</a>
												</li>
											</ul>
										</div>
										<div class="tab-pane tab" id="student_document">
											<h3 class="mb-3">Student Documents</h3>
											<hr/>
											<section>
												<div class="row">
													<div class="col-md-12">                      	
														<input type="hidden" name="studentid" id="studentid" value="">		
														<table class="table table-bordered" style="" id="student_doc"m>
															<thead>
																<tr style="background-color: #e3f2fd;">
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
																		<textarea id="doc_description" name="doc_description[]" class="form-control doc_description" placeholder="Enter doc description" value="{{ old('doc_description[]') }}" rows="2" cols="2"></textarea> 
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
																</tr>
															</tbody>
														</table>											
													</div>												
												</div>											
											</section>		
											<ul class="tab-links nav nav-tabs pull-right mt-3">
												<li class="nav-item">
													<a href="#back_tab1" class="nav-link btn btn-sm text-white bg-primary prevButton">Prev</a>
												</li>
												<li class="nav-item">
													<input type="submit" name="submit" value="Submit"  class="btn bg-success text-white">
												</li>
											</ul>								
										</div>
		          					</div>
		          				</form>		
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
	jQuery('.tabs .tab-links a').on('click', function(e)  {
		var currentAttrValue = jQuery(this).attr('href');

		// Show/Hide Tabs
		jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

		// Change/remove current tab to active
		jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});


	jQuery('.nextButton').on('click', function() {
		var $activeTab = $('.tab-links li.active');
		var $wrapper = jQuery(this).closest('.tabs');
		var indexActive = $wrapper.find('li.active').index();
		$wrapper.find('li').eq(indexActive + 1).find('a').click();
	});

	jQuery('.prevButton').on('click', function() {
		var $activeTab = $('.tab-links li.active');
		var $wrapper = jQuery(this).closest('.tabs');
		var indexActive = $wrapper.find('li.active').index();
		$wrapper.find('li').eq(indexActive - 1).find('a').click();
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

$(document).ready(function(){
	$('.status').on('change',function(e){
		e.preventDefault();
		var status = $(this).val();
		// console.log(status);
		 passout_date(status);
		
	});

	var status = "{{old('status')}}";
	if(status !=''){
		 passout_date(status);
	}

	function passout_date(status){
		if(status == 'P'){
			$('.passout_date').show();
		}else{
			$('.passout_date').hide();
		}
	} 

	var i = 0;
	$('#qual_field').append('<tr id="row'+i+'"><td class=""><input type="text" name="prev_school[]" class="form-control"></td><td class=""><input type="text" name="qual_clg[]" class="form-control"></td><td class=""><input type="text" name="qual_board[]" class="form-control"></td><td class=""><input type="text" name="qual_marks[]" class="form-control"></td><td class=""><input type="text" name="qual_years[]" class="form-control" ></td><td class=""><select class="form-control" name="qual_division[]"><option value="">Select Division</option><option value="1">1st</option><option value="2">2nd</option><option value="3">3rd</option></select></td><td><a class="btn btn-sm btn-success" id="add_row"><i class="fa fa-plus"></i></a></td></tr>');
	i++;
	 $('#add_row').click(function(){
	 	$('#qual_field').append('<tr id="row'+i+'"><td class=""><input type="text" name="qual_name[]" class="form-control"></td><td class=""><input type="text" name="qual_clg[]"  class="form-control"></td><td class=""><input type="text" name="qual_board[]" class="form-control"></td><td class=""><input type="text" name="qual_marks[]" class="form-control"></td><td class=""><input type="text" name="qual_years[]" class="form-control"></td><td class=""><select class="form-control" name="qual_division[]"><option value="">Select Division</option><option value="1">1st</option><option value="2">2nd</option><option value="3">3rd</option></select></td><td><a class="btn btn-sm btn-danger btn_remove1" id="'+i+'"><i class="fa fa-minus"></i></a></td></tr>');
	 	i++;
	 });

	$(document).on('click', '.btn_remove1', function(){
		var button_id = $(this).attr("id");
		//alert(button_id); 
		$('#row'+button_id+'').remove();
	});

	var guard_info  = 0;
	@if(old('relation') !=null)
		@if(count(old('relation')) !=0)
			var guard_info = {{count(old('relation')) }};
			
		
		@endif
	@endif
	
	var k =0;

	var html_div ='<div class="form-group row relation"><div class="col-sm-6 col-md-4 col-xs-6 "><label class="">Relation <strong class="text-danger">*</strong></label><select name="relation[]" class="form-control "><option value="">Select Relation</option>@foreach(RELIGION as $key =>$val)<option value="{{$key}}">{{$val}}</option>@endforeach ></select></div><div class="col-md-4 col-sm-6 col-xs-6 "><label class="">Name <strong class="text-danger">*</strong></label><input type="text" name="g_name[]" class="form-control " value=""></div><div class="col-md-4 col-sm-6 col-xs-6 "><label class="required">Mobile <strong class="text-danger">*</strong></label><input type="text" name="g_mobile[]" class="form-control "></div></div><div class="row form-group"><div class="col-md-4 col-xs-6 col-sm-6 "><label class="">Work Status</label><select name="work_status[]" class="form-control"><option value="">Select Work Status</option><option value="0">Self Employed</option><option value="1">Job</option><option value="3">Retired</option></select></div><div class="col-md-4 col-xs-6 col-sm-6 "><label class="">Employment Type</label><select name="employment_type[]" class="form-control"><option value="">Select Employment Type</option><option value="0">Government</option><option value="1">Private</option></select></div><div class="col-md-4 col-xs-6 col-sm-6 "><label class="">Professtion Type</label><select name="profession_status[]" class="form-control"><option value="">Select Profession type</option>">@foreach($professtionType as $key =>$professtionTypes)<option value="{{$professtionTypes->id}}">{{$professtionTypes->professtion_types_name}}</option>@endforeach ></select></div></div><div class="form-group row"><div class="col-md-4 col-xs-6 col-sm-6 "><label>Employer</label><input type="text" name="employer[]" class="form-control"></div><div class="col-md-4 col-xs-6 col-sm-6 "><label>Designation</label><select class="form-control" name="designation_id[]"><option value="">Select Designation Name</option> @foreach($guardianDesignation as $key =>$guardianDesignations)<option value="{{$guardianDesignations->id}}">{{$guardianDesignations->guardian_designations_name}}</option>@endforeach </option></select></div><div class="col-md-4 col-xs-6 col-sm-6 "><label >Photo</label><input type="file" name="g_photo[]" id="g_photo" accept="image/*"><input type="hidden" name="g_check[]" class="g_photo" value=""><input type="hidden" name="g_id[]" value=""></div><hr></div>';


	// for(var z = 0; z < guard_info; z++){
		$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-success " style="margin:10px 10px 0px 0px" id="add_guar"><i class="fa fa-plus"></i> Add More</a></div></div>'+html_div+'</div>');

	// }
		

			        		
	k++;
	function guard_info_fn(){
		$('#guard_info').append('<div id="row'+k+'"><div class="row form-group "><div class="col-xl-12 col-md-12 col-sm-12"><a href="#" class="pull-right btn btn-sm btn-danger btn_remove" style="margin:10px 10px 0px 0px" id="'+k+'"><i class="fa fa-minus"></i></a></div></div>'+html_div+'</div>');
		k++;
	}


    $('#add_guar').click(function(e){
    	e.preventDefault();
    	guard_info_fn();
    	
    });

    if(guard_info !=0){

    	for(var z=1; z<guard_info ; z++){
			guard_info_fn();
    	}
	}	




   
    $(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		//alert(button_id); 
		$('#row'+button_id+'').remove();
	});

});



	// get State when select country code..........................
// 	$('#p_country_id').on('change',function(){
// 	 	var country_id = $(this).val();
// 		if(country_id !='' ){
// 			$.ajax({
// 				type:'POST',

// 				url: "{{route('get_p_state')}}",
// 				data: {country_id:country_id, "_token": "{{ csrf_token() }}",},
// 				success:function(res){
// 					// $('#p_state_id').empty().html(res);
// 					$("#p_state_id").empty();
// 	                $("#p_state_id").append('<option>Select</option>');
// 	                $.each(res,function(key,value){
// 	            		$("#p_state_id").append('<option value="'+value.id+'">'+value.state_name+'</option>');
// 	        		});
// 				}
// 			});
// 		}else{
// 			alert('please select city field');
// 		}	 
// 	});
// 	$('#p_state_id').on('change',function(){
// 	 	var state_id = $(this).val();
// 		 if(state_id !='' ){
// 			$.ajax({
// 				type:'POST',

// 				url: "{{route('get_p_city')}}",
// 				data: {state_id:state_id, "_token": "{{ csrf_token() }}",},
// 				success:function(res){
// 					// $('#p_state_id').empty().html(res);
// 					$("#p_city_id").empty();
// 	                $("#p_city_id").append('<option>Select</option>');
// 	                $.each(res,function(key,value){
// 	            		$("#p_city_id").append('<option value="'+value.id+'">'+value.city_name+'</option>');
// 	        		});
// 				}
// 			});
// 		}else{
// 			alert('please select state field');
// 		}
// 		});
// 	// get State city when select country code..........................
// 	$('#l_country_id').on('change',function(){
// 	 var country_id = $(this).val();
// 		 if(country_id !='' ){
// 			$.ajax({
// 				type:'POST',

// 				url: "{{route('get_p_state')}}",
// 				data: {country_id:country_id, "_token": "{{ csrf_token() }}",},
// 				success:function(res){
// 					// $('#p_state_id').empty().html(res);
// 					$("#l_state_id").empty();
// 	                $("#l_state_id").append('<option>Select</option>');
// 	                $.each(res,function(key,value){
// 	            		$("#l_state_id").append('<option value="'+value.id+'">'+value.state_name+'</option>');
// 	        		});
// 				}
// 			});
// 		}else{
// 			alert('please select city field');
// 		}
// 		});
// 	$('#l_state_id').on('change',function(){
// 	 var state_id = $(this).val();
// 		 if(state_id !='' ){
// 			$.ajax({
// 				type:'POST',
// 				url: "{{route('get_p_city')}}",
// 				data: {state_id:state_id, "_token": "{{ csrf_token() }}",},
// 				success:function(res){
// 					// $('#p_state_id').empty().html(res);
// 					$("#l_city_id").empty();
// 	                $("#l_city_id").append('<option>Select</option>');
// 	                $.each(res,function(key,value){
// 	            		$("#l_city_id").append('<option value="'+value.id+'">'+value.city_name+'</option>');
// 	        		});
// 				}
// 			});
// 		}else{
// 			alert('please select state field');
// 		}
// 		});
// 	// get State and country when select country code..........................
// 	$('#acadmic_city_id').on('change',function(){
// 	 var state_id = $(this).val();
// 		 if(state_id !='' ){
// 			$.ajax({
// 				type:'POST',

// 				url: "{{route('get_academic_state')}}",
// 				data: {state_id:state_id, "_token": "{{ csrf_token() }}",},
// 				success:function(res){
// 					// $('#p_state_id').empty().html(res);
// 					$("#acadmic_state_id").empty();
// 	                $("#acadmic_state_id").append('<option>Select</option>');
// 	                $.each(res,function(key,value){
// 	            		$("#acadmic_state_id").append('<option value="'+value.country_id+'">'+value.state_name+'</option>');
// 	        		});
// 				}
// 			});
// 		}else{
// 			alert('please select state field');
// 		}
// 		});
// 	$('#acadmic_state_id').on('change',function(){
// 	 var country_id = $(this).val();
// 		 if(country_id !='' ){
// 			$.ajax({
// 				type:'POST',
// 				url: "{{route('get_academic_country')}}",
// 				data: {country_id:country_id, "_token": "{{ csrf_token() }}",},
// 				success:function(res){
// 					// $('#p_state_id').empty().html(res);
// 					$("#acadmic_country_id").empty();
// 	                $("#acadmic_country_id").append('<option>Select</option>');
// 	                $.each(res,function(key,value){
// 	            		$("#acadmic_country_id").append('<option value="'+value.id+'">'+value.country_name+'</option>');
// 	        		});
// 				}
// 			});
// 		}else{
// 			alert('please select country field');
// 		}
// });


/* add table row For student document..................................*/
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
    

	$('#p_l_same').on('change',function(){
		var check = $("[name='same_as']:checked").val();
		if(check == 'on'){
			var address = $('#p_address').val();
			var city = $('#p_city').val();		
			var state = $('#p_state').val();
			var zip_code = $('#p_zip_code').val();
			var country = $('#p_country').val();
		
			$('#l_address').val(address);
			$('#l_city').val(city);
			$('#l_state').val(state);
			$('#l_country').val(country);
			$('#l_zip_code').val(zip_code);

			$('.loc_addr').attr('readonly','true');
		
		}else{
			$('#l_address').val('');
			$('#l_city').val('');
			$('#l_state').val('');
			$('#l_country').val('');
			$('#l_zip_code').val('');
					
			$('.loc_addr').removeAttr('readonly');
		}
	});


    });

 	$(document).on('click', '.add_more_std_doc', function(){
       var row_id = $(this).attr("id");

       $('#'+row_id).remove();
     });


</script>

 @endsection
