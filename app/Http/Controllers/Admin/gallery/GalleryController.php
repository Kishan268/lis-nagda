<?php

namespace App\Http\Controllers\Admin\gallery;
use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\gallery\GalleryFolder;

class GalleryController extends Controller
{
    public function index(){
    	$galleryFolder = GalleryFolder::get();
    	return view('admin.gallery.index',compact('galleryFolder'));
    }
    public function galleryFolder(){
    	return view('admin.gallery.gallery-folder');
    	
    } 
    public function createGalleryFolder(Request $request){

    	$data = $request->validate(['folder_name'=>'required']);
    	$data['user_id'] = Auth::user()->id;
    	$galleryFolder = GalleryFolder::create($data);
    	if ($galleryFolder) {
    		
    	 return redirect()->back()->with('success','Folder created successfully');
    	}
    	
    }
    public function addGalleryImageVideo($id){
    	$folderId =$id;
    	return view('admin.gallery.gallery-image-video',compact('folderId'));

    }
    public function galleryImageAdd($id){
    	// dd($id);
    		$galleryFolder = GalleryFolder::where('id',$id)->first();
    	return view('admin.gallery.gallery-image-create',compact('galleryFolder'));
    	 
    }
    public function galleryImageUpload(Request $request){
    	// dd($request->gallery_image);
    	 $input = $request->all();
		    $images=array();
		    if($files=$request->file('gallery_image')){
		        foreach($files as $file){
		            $name = $file->getClientOriginalName();
		            $file->move('gallery_image',$name);
		            $images[]=$name;
		        }
		    }
		    dd($images);
		    /*Insert your data*/

		    Detail::insert( [
		        'images'=>  implode("|",$images),
		        'description' =>$input['description'],
		        //you can put other insertion here
		    ]);


		    return redirect('redirecting page');
    	$folderId =$id;
    	return view('admin.gallery.gallery-image-create',compact('folderId'));
    }
}
