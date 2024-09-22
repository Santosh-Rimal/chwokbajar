<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use App\Http\Requests\CreateAboutRequest;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $abouts=About::latest()->paginate(10);
        return view('Admin.About.about',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.About.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAboutRequest $request)
    {
        $input = $request->all();
        $input['image'] = $this->fileUpload($request, 'image');
        $about =  About::create($input);
        return redirect()->route('admin.abouts.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        return view('Admin.About.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
         $old_image = $about->image;
        $input = $request->all();
        $image = $this->fileUpload($request, 'image');
        if ($image) {
            $this->removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $about->update($input);
        return redirect()->route('admin.abouts.index')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        $this->removeFile($about->image);
        $about->delete();
        return redirect()->route('admin.abouts.index')->with('success', 'Delete Successfully');
    }



     public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/assets/images/about';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/images/about/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}