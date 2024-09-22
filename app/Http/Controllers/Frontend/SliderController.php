<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin\Home;
use App\Models\Admin\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function home(){
        $homes=Home::get();
        $abouts=About::get();
        return view('Frontend.home',compact('homes','abouts'));
    }
}