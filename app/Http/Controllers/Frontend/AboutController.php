<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index(){
        $abouts=About::get();
        return view('Frontend.about',compact('abouts'));
    }
}