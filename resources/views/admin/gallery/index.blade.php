 @extends('layouts.main')
 @section('content')


	<div class="row mt-2">
    <div class="col-lg-12">

      <!-- Default Card Example -->
      <div class="card mb-4">
        <div class="card-header">
          <div class="panel-heading">
				<h4 class="panel-title">Gallery  <a href="{{route('gallery_folder')}}" class="btn btn-success pull-right">Add Folder</a><a href="{{ URL::previous() }}" class="btn btn-info pull-right">Back</a></h4>
			</div>
        </div>
<div class="card-body">
<div class="col-md-12">
<div class="panel panel-default">
	<div class="">
     @if($message = Session::get('success'))   
      	<div class="alert alert-success">{{ $message }}</div>
     @endif
  </div>
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
								@foreach($galleryFolder as $galleryFolders)
								
									<div class="col-md-3" style="border: solid;">
										<a href="{{route('gallery_folder_delete',$galleryFolders->id)}}" class="fa fa-trash text-danger">Delete folder</a>
										<div class="row">
											<a href="{{route('gallery_image_video_add',$galleryFolders->id)}}">
											<div>

											@foreach($galleryFolders->gallery_image as $imageName)
											@if($imageName->gallery_image)
											<img src="{{asset($imageName->gallery_image !=null ? $imageName->gallery_image: 'storage/admin/student_demo.png')}}" style="width: 280px; height: 300px; border: solid;">
											@break;

											@else
											<img src="" style="width: 300px; height: 200px; border: solid;">
											@endif
											@endforeach
											</div>
											</a>
										</div>
										<a href="{{route('gallery_image_video_add',$galleryFolders->id)}}">{{$galleryFolders->folder_name}}</a>
										<div><span>Image:{{count($galleryFolders->gallery_image ? $galleryFolders->gallery_image :'0')}}</span></div>
									</div>
								@endforeach
								
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
