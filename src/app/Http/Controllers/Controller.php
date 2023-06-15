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

    public function about ()
    {
        return view('about');
    }

    public function nameko ()
    {
        return view('nameko');
    }

    public function terms ()
    {
        return view('terms');
    }

    public function policy ()
    {
        return view('policy');
    }

    public function law ()
    {
        return view('specific_trade_law');
    }


}
