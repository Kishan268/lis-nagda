 @extends('layouts.main')
 @section('content')


	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title">Image Gallery  <a href="{{route('gallery_image_add',$folderId)}}" class="btn btn-success pull-right">Add Image</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right">Back</a></h4>
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
												{{-- @foreach($galleryFolder as $galleryFolders)
													<div class="col-md-3">
														<div class="row">
															<a href="{{route('gallery_image_video_add',$galleryFolders->id)}}">
															<div>
															<img src="" style="width: 300px; height: 200px;" >
															</div>
															</a>
														</div>
														<a href="">{{$galleryFolders->folder_name}}</a>
													</div>
												@endforeach --}}
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
				<h4 class="panel-title">Video Gallery <a href="http://localhost:8000/gallery-folder" class="btn btn-success pull-right">Add Video</a></h4>
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
