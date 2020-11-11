<?php

namespace App\Http\Controllers\Admin\fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Helpers;
use App\Models\fees\FeesHeadMast;
use App\Models\fees\FineType;
class HeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headTypes = Helpers::headTypes();
        $fineTypes = Helpers::fineTypes();
        $fine = Helpers::fine();
        $feesHeadMast = FeesHeadMast::with('Fine_type')->get();
        return view ('admin.fees.heads.index',compact('headTypes','fineTypes','fine','feesHeadMast'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data['name'] = $request->head_name;
        $data['amount'] = $request->head_amt;
        $data['head_type'] = $request->headtype;
        $data['head_sq_no'] = $request->head_sequence_order;
        $data['refundable_status'] = $request->refundable;
        $data['type'] = $request->applicable_on;
        $data['instalment_applicable_status'] = $request->is_installable;
        $lastId = FeesHeadMast::create($data)->id;

        for ($i=0; $i < count($request->fine_type); $i++) { 
            
            $data2 = array(
                'fees_head_mast_id'=>$lastId,
                'fine_type'=>$request->fine_type[$i],
                'fine_amount_status'=>$request->fine[$i],
                'no_of_days'=>$request->fine_day[$i],
                'fine_amount'=>$request->fine_amount[$i]
            );
            
            FineType::create($data2);
        }
        return redirect()->back()->with('success','Heads added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['name'] = $request->head_name;
       
        $lastId = FeesHeadMast::find($id)->update($data);
        return redirect()->back()->with('success','Heads updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
