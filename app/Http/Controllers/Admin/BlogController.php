<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Blog;
use Illuminate\Http\Request;
use File;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs=Blog::latest()->paginate(10);
        return view('Admin.Blog.blog',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBlogRequest $request)
    {
        $input = $request->all();
        $input['image'] = $this->fileUpload($request, 'image');
        $blog =  Blog::create($input);
        return redirect()->route('admin.blogs.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('Admin.Blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
         $old_image = $blog->image;
        $input = $request->all();
        $image = $this->fileUpload($request, 'image');
        if ($image) {
            $this->removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $blog->update($input);
        return redirect()->route('admin.blogs.index')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $this->removeFile($blog->image);
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Delete Successfully');
    }

     public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/assets/images/blog';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/images/blog/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}