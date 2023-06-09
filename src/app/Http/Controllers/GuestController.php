<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InstagramService;

class GuestController extends Controller
{
    public function index ()
    {
        $instagramService = new InstagramService();
        $response_body = $instagramService->getInstagramRequestBody();

        return view('index', compact('response_body'));
    }
}
