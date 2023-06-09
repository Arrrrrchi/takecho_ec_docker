<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InstagramService;

class GuestController extends Controller
{
    public function index ()
    {
        $response_body = InstagramService::getInstagramRequestBody();

        return view('index', compact('response_body'));
    }
}
