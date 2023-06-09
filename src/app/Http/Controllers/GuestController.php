<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InstagramService;
use App\Services\YoutubeService;

class GuestController extends Controller
{
    public function index ()
    {
        $instagramService = new InstagramService();
        $instagram_api_response = $instagramService->getInstagramRequestBody();

        $youtubeService = new YoutubeService();
        $youtube_api_response = $youtubeService->getYoutubeRequestBody();

        return view('index', compact('instagram_api_response', 'youtube_api_response'));
    }
}
