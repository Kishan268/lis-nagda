<?php

namespace App\Http\Controllers\Admin\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master\studentClass;
use App\Models\master\studentBatch;
use App\Models\master\studentSectionMast;
use App\Models\master\castCategory;
use App\Models\master\stdReligions;
use App\Models\master\stdBloodGroup;
use App\Models\master\stdNationality;
use App\Models\master\countryMast;
use App\Models\master\stateMast;
use App\Models\master\cityMast;
use App\Models\master\mothetongueMast;
use App\Models\master\professtionType;
use App\Models\master\guardianDesignation;
use Validator;
class masterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

	// student class add code.............................
    public function studentClasses()
    {
    	$studentclassdata = studentClass::get();
    		return view('admin.master.classes.index',compact('studentclassdata'));
    } 
    public function addClasses(Request $request)
    {
        $data = $request->validate(['class_name'=>'required']);
    	studentClass::create($data);
    		return redirect('master/classes');

    }
    public function updateClasses(Request $request, $id)
    {
        $data =$request->validate(['class_name'=>'required']);
    	
    	 studentClass::where('id',$id)->update($data);
    		return redirect('master/classes');
    		
    }

	// end student class add code.............................

	//  student batch add code.............................

    public function studentBatches()
    {
    	$studentBatch = studentBatch::get();

    		return view('admin.master.batches.index',compact('studentBatch'));
    } 
    public function addBatch(Request $request)
    {
    	// dd($request);
        $data = $request->validate([
        		'batch_from'=>'required',
        		'batch_to'=>'required'
        ]);
    	 studentBatch::create($data);

    		return redirect('master/batches');
    }
    public function updateBatch(Request $request, $id)
    {
        $data = $request->validate([
        		'batch_from'=>'required',
        		'batch_to'=>'required'
        ]);
    	studentBatch::where('id',$id)->update($data);
    	return redirect('master/batches');
    }
	//  student batch add code.............................

	//  student sectintion add code.............................

    public function studentSection()
    {
    	$studentSection = studentSectionMast::get();

    		return view('admin.master.sections.index',compact('studentSection'));
    } 
    public function addSection(Request $request)
    {
    	// dd($request);
        $data = $request->validate([
        	'section_name'=>'required'
        ]);
    	 studentSectionMast::create($data);

    		return redirect('master/section');
    }
    public function updateSection(Request $request, $id)
    {
        $data = $request->validate(['section_name'=>'required']);
    	 studentSectionMast::where('id',$id)->update($data);
    	return redirect('master/section');
    }
	

	//  cast categories add code.............................
    public function castCategory()
    {
    	$castCategory = castCategory::get();
    		return view('admin.master.cast-categories.index',compact('castCategory'));
    } 
    public function addcastCategory(Request $request)
    {
        $data = $request->validate(['caste_category_name'=>'required']);
    	castCategory::create($data);
    		return redirect('master/cast-category');
    }
    public function updatecastCategory(Request $request, $id)
    {
        $data = $request->validate(['caste_category_name'=>'required']);
    	castCategory::where('id',$id)->update($data);
    	return redirect('master/cast-category');
    }

    //  Religion add code.............................
    public function stdReligion()
    {
    	$stdReligions = stdReligions::get();
    		return view('admin.master.religions.index',compact('stdReligions'));
    } 
    public function addStdReligion(Request $request)
    {
        $data = $request->validate(['religion_name'=>'required']);
    	stdReligions::create($data);
    		return redirect('master/religions');
    }
    public function updateStdReligion(Request $request, $id)
    {
        $data =  $request->validate(['religion_name'=>'required']);
    	stdReligions::where('id',$id)->update($data);
    	return redirect('master/religions');
    }

     //  Blood group add code.............................
    public function stdBloodGroups()
    {
    	$stdBloodGroups = stdBloodGroup::get();
    		return view('admin.master.blood-groups.index',compact('stdBloodGroups'));
    } 
    public function addStdBloodGroup(Request $request)
    {
        $data =  $request->validate(['blood_group_name'=>'required']);
    	 stdBloodGroup::create($data);
    		return redirect('master/blood-group');
    }
    public function updateStdBloodGroup(Request $request, $id)
    {
        $data =  $request->validate(['blood_group_name'=>'required']);
    	 stdBloodGroup::where('id',$id)->update($data);
    	return redirect('master/blood-group');
    } 

    //  Nationalities add code.............................
    public function stdNationalities()
    {
    	$stdstdNationalities = stdNationality::get();
    		return view('admin.master.nationality.index',compact('stdstdNationalities'));
    } 
    public function addStdNationalities(Request $request)
    {
        $data =  $request->validate(['nationality_name'=>'required']);
    	 stdNationality::create($data);
    		return redirect('master/nationality');
    }
    public function updateStdNationalities(Request $request, $id)
    {
        $data = $request->validate(['nationality_name'=>'required']);
    	 stdNationality::where('id',$id)->update($data);
    	return redirect('master/nationality');
    }

//  mothetongue add code.............................
    public function stdMothetongue()
    {
        $stdMothetongue = mothetongueMast::get();
            return view('admin.master.mothetongue.index',compact('stdMothetongue'));
    } 
    public function addStdMothetongue(Request $request)
    {
        $data =  $request->validate(['mothetongue_name'=>'required']);
         mothetongueMast::create($data);
            return redirect('master/mothetongue');
    }
    public function updateStdMothetongue(Request $request, $id)
    {
        $data = $request->validate(['mothetongue_name'=>'required']);
         mothetongueMast::where('id',$id)->update($data);
        return redirect('master/mothetongue');
    }

    //  ProfesstionType add code.............................
    public function professtionType()
    {
        $professtionType = professtionType::get();
            return view('admin.master.professtiontype.index',compact('professtionType'));
    } 
    public function addProfesstionType(Request $request)
    {

        $data =  $request->validate(['professtion_types_name'=>'required']);
         professtionType::create($data);
            return redirect('master/professtiontype');
    }
    public function updateProfesstionType(Request $request, $id)
    {
        $data = $request->validate(['professtion_types_name'=>'required']);
         professtionType::where('id',$id)->update($data);
        return redirect('master/professtiontype');
    }
    //  Gaurdian Designation add code.............................
    public function gaurdianDesignation()
    {
        $gaurdianDesignation = guardianDesignation::get();
            return view('admin.master.gaurdian-designation.index',compact('gaurdianDesignation'));
    } 
    public function addGaurdianDesignation(Request $request)
    {
        
        $data =  $request->validate(['guardian_designations_name'=>'required']);
         guardianDesignation::create($data);
            return redirect('master/gaurdian_designation');
    }
    public function updateGaurdianDesignation(Request $request, $id)
    {
        $data = $request->validate(['guardian_designations_name'=>'required']);
         guardianDesignation::where('id',$id)->update($data);
        return redirect('master/gaurdian_designation');
    }

    //  Counties add code.............................
    public function county()
    {
    	$county = countryMast::get();
    		return view('admin.master.countries.index',compact('county'));
    } 
    public function addCounty(Request $request)
    {
        $data = $request->validate([
        	'country_name'=>'required',
        	'country_code'=>'required'
        ]);
    	 countryMast::create($data);
    		return redirect('master/countries');
    }
    public function updateCounty(Request $request, $id)
    {
        $data = $request->validate([
        	'country_name'=>'required',
        	'country_code'=>'required'
        ]);
    	 countryMast::where('id',$id)->update($data);
    	return redirect('master/countries');
    }


    //  State add code.............................
    public function state()
    {
    	$state = stateMast::get();
    	$county = countryMast::get();
    	
    	// $countyName = countryMast::where('country_name',$county->id)->first();
    	// dd($countyName);
    		return view('admin.master.states.index',compact('state','county'));
    } 
    public function addState(Request $request)
    {
        $data = $data = $request->validate([
        	'state_name'=>'required',
        	'country_id'=>'required'
        ]);
        // dd($data);
    	 stateMast::create($data);
    		return redirect('master/state');
    }
    public function updateState(Request $request, $id)
    {
        $data = $data = $request->validate([
        	'state_name'=>'required',
        	'country_id'=>'required'
        ]);
    	 stateMast::where('id',$id)->update($data);
    	return redirect('master/state');
    }

  //  City add code.............................
    public function city()
    {
    	$state = stateMast::get();
    	$city = cityMast::get();
    	
    	// $countyName = countryMast::where('country_name',$county->id)->first();
    	// dd($countyName);
    		return view('admin.master.cities.index',compact('state','city'));
    } 
    public function addCity(Request $request)
    {
        $data = $data = $request->validate([
        	'city_name'=>'required',
        	'state_id'=>'required'
        ]);
    	 cityMast::create($data);
    		return redirect('master/cities');
    }
    public function updateCity(Request $request, $id)
    {
         $data = $data = $request->validate([
        	'city_name'=>'required',
        	'state_id'=>'required'
        ]);
    	 cityMast::where('id',$id)->update($data);
    	return redirect('master/cities');
    }

}
