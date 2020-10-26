 @extends('layouts.main')
 @section('content')


	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title">Add Image  <a href="{{ URL::previous() }}" class="btn btn-info pull-right">Back</a></h4>
			</div>
        </div>
        <div class="card-body">
         	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
				<br>
				<div class="row">
					<div class="col-md-12 table-responsive" id="tableFilter">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
							<div class="card-body">
					         	<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-body">
											<div class="row">
											<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('gallery_image_upload')}}">
											@csrf
										     <div class="fileupload fileupload-new" data-provides="fileupload">
					                        <div>
					                          <div class="fileupload-new">
					                            <!-- <input name="file[]" type="file" id="file"/> -->
					                          </div>
					                          <br>
					                         
					                          <div id="filediv" style="display: block;">
					                          	<input name="gallery_image[]" type="file" id="gallery_image" multiple><br><br>
					                          	<input type="hidden" name="folder_id" value="{{$galleryFolder->id}}">
					                          	<input type="hidden" name="folder_name" value="{{$galleryFolder->folder_name}}">
					                          </div>
					                          <input type="button" id="add_more" class="btn btn-info" value="Add ">
					                          <!--  <span class="fileupload-exists">Change</span> -->
					                          <input type="submit" value="Upload " id="upload" name="submit" class="btn btn-primary" style="padding-left:32px; padding-right:25px;">
					                          <br>
					                          <br>
					                          <div style="color:red;">
					                              
					                          </div>
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
				</div>
			</div>
		</div>

	</div>
</div>
<div class="row mt-2">
    <div class="col-lg-12">
      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title"> Upload Image Zip File  </h4>
			</div>
        </div>
        <div class="card-body">
         	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">	
				<br>
				<div class="row">
					<div class="col-md-12 table-responsive" id="tableFilter">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
							<div class="card-body">
					         	<div class="col-md-12">
									<div class="panel panel-default">
										<div class="panel-body">
											<div class="row">
												<div class="fileupload fileupload-new" data-provides="fileupload">
					                        <div>
					                          <div class="fileupload-new">
					                           <input name="zipfile" type="file" id="file1" required=""> 
					                          </div>
					                          <br>
					                         
					                          <!--  <span class="fileupload-exists">Change</span> -->
					                          <input type="submit" value="Upload " id="upload" name="submit" class="btn btn-primary" style="padding-left:32px; padding-right:25px;">
					                          <br>
					                          <br>
					                          <div style="color:red;">
					                              
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
			</div>
		</div>

	</div>
</div>
    </div>
 </div>
    </div>
 </div>

 @endsection
