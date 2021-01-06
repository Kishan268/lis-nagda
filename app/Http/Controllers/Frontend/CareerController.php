<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function career(){
    	return view('frontend/More/career');

    }
    public function openings(){
    	return view('frontend/More/openings');

    }
}
