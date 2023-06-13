<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Services\InstagramService;
use App\Services\YoutubeService;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index ()
    {
        $products = Product::with('category')->where('is_selling', true)->get();

        $instagramService = new InstagramService();
        $instagram_api_response = $instagramService->getInstagramRequestBody();

        $youtubeService = new YoutubeService();
        $youtube_api_response = $youtubeService->getYoutubeRequestBody();

        return view('index', compact('products', 'instagram_api_response', 'youtube_api_response'));
    }

}
