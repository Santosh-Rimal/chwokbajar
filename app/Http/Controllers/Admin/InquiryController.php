<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Inquiry;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Inquiries=Inquiry::latest()->paginate(10);
        return view('Admin.contact',compact('Inquiries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    // Find the inquiry by its id
    $inquiry = Inquiry::findOrFail($id);
    
    // Delete the inquiry
    $inquiry->delete();
    
    // Redirect back with a success message
    return redirect()->route('admin.contacts.index')->with('success', 'Inquiry deleted successfully.');
}

}