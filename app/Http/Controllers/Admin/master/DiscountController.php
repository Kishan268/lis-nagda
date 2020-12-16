<?php

namespace App\Http\Controllers\Admin\master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    
    public function index()
    {
        return view('admin.master.discount.index');
    }

    
    public function create()
    {
        return view('admin.master.discount.create');
        
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function descountTypeIndex(){
        return view('admin.master.discount-type.index');
    }
    public function descountTypeCreate(Request $request){
        dd();
        
        return view('admin.master.discount-type.create');
    }
}
