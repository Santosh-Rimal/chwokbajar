<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Admin\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class blogController extends Controller
{
    public function index(){
        $blogs=Blog::get();
        return view('Frontend.blog',compact('blogs'));
    }

    public function show($id){
        $blog = Blog::findOrFail($id); // Find the blog by ID or fail
        return view('Frontend.singleblog', compact('blog')); // Return to single blog view
    }
}