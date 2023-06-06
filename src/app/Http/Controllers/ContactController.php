<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendContactMail;


class ContactController extends Controller
{
    public function index ()
    {
        return view('contact.index');
    }

    public function confirm (Request $request)
    {
        $request->validated();

        $inputs = $request->all();

        return view('contact.confirm', compact('inputs'));
    }

    public function send (Request $request)
    {
        $request->validated();

        $action = $request->input('action');

        $inputs = $request->except('action');

        if ($action !== 'submit') {
            return redirect()->route('contact.index')->withInput($inputs);
        } else {
            SendContactMail::dispatch($inputs);
            return view('contact.thanks');
        }
    }
}
