<?php

namespace App\Http\Controllers\Admin;
use File;
use App\Models\Admin\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHomeRequest;
use App\Http\Requests\UpdateHomeRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homes=Home::latest()->paginate(10);
        return view('Admin.Home.home',compact('homes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Home.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateHomeRequest $request)
    {
         $input = $request->all();
        $input['image'] = $this->fileUpload($request, 'image');
        $home =  Home::create($input);
        return redirect()->route('admin.homes.index')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        return view('Admin.Home.edit',compact('home'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
         $old_image = $home->image;
        $input = $request->all();
        $image = $this->fileUpload($request, 'image');
        if ($image) {
            $this->removeFile($old_image);
            $input['image'] = $image;
        } else {
            unset($input['image']);
        }
        $home->update($input);
        return redirect()->route('admin.homes.index')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
         $this->removeFile($home->image);
        $home->delete();
        return redirect()->route('admin.homes.index')->with('success', 'Delete Successfully');
    }

     public function fileUpload(Request $request, $name)
    {
        $imageName = '';
        if ($image = $request->file($name)) {
            $destinationPath = public_path() . '/admin/assets/images/home';
            $imageName = date('YmdHis') . $name . "-" . $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $image = $imageName;
        }
        return $imageName;
    }

    public function removeFile($file)
    {
        $path = public_path() . '/admin/images/home/' . $file;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}