<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Jobs\SendContactMail;



class ContactController extends Controller
{
    public function index ()
    {
        return view('contact.index');
    }

    public function confirm (ContactRequest $request)
    {
        $request->validated();

        $inputs = $request->all();

        return view('contact.confirm', compact('inputs'));
    }

    public function send (Request $request)
    {
        $action = $request->input('action');

        $name = $request->name;
        $email = $request->email;
        $body = $request->body;

        if ($action !== 'submit') {
            return redirect()->route('contact.index', compact('inputs'));
        } else {
            SendContactMail::dispatch($name, $email, $body);
            return view('contact.thanks');
        }
    }
}
