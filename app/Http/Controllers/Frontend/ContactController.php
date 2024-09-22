<?php

namespace App\Http\Controllers\Frontend;

use Validator;
use Illuminate\Http\Request;
use App\Models\Admin\Inquiry;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    public function index(){
        return view('Frontend.contact');
    }
     public function submitContact(Request $request)
    {
        // Validate the request input
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // If validation fails, return with error message
        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput();
        }

        // Store the inquiry data (assuming you have an Inquiry model)
        Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'mesage' => $request->message,
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}