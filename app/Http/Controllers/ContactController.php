<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Mail\ContactMail;
use Mail;

class ContactController extends Controller
{
    //menampilkan view
    function show()
    {
        return view('contact.contact');
    }

    function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
            'file' => 'required|mimes:jpeg,png,pdf|max:2048'
        ]);



        if ($request->file('file')->isValid()) {
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('uploads'), $fileName);
        } else {
            dd('error');
        }



        // $data = [
        //     'email' => 'example@example.com',
        // ];

        // $rules = [
        //     'email' => 'regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',
        // ];

        // $validator = Validator::make($data, $rules);

        $input = $request->all();
        Mail::to($input['email'])->send(new ContactMail($input));

        return redirect()->back()->with(['success' => 'Thank you for contacts us']);
    }
}
