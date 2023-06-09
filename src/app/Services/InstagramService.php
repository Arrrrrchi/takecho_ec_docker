<?php

namespace App\Services;

class InstagramService
{
    CONST USER_ID = '17841457188089246';
    CONST POST_COUNT = '9';
    CONST RECENT_FIELDS = 'id,media_type,media_url,permalink';
    CONST ACCESS_TOKEN = 'EAAJGm0ZB4ZAI8BALCMGMO5ffz5X9lcGPBZCVevJWyZCWAZBoyc3DpmjYeRiB4oNoxETs2OgLzXSCqCOx2LybLvgnPIDEdZAqUIxdy3g5gSmYo7IK52GFqPU1dvCSc2iIBRWplylGetciAx9xCaZANPLzZA4SKRRANAaxBmCbNY1AJDJGk6IiFZCVI';

    public static function getInstagramRequestBody()
    {
        $base_url = 'https://graph.facebook.com/v9.0/';
        $path = self::USER_ID.'?fields=name,media.limit('.self::POST_COUNT.'){media_type,caption,like_count,media_url,thumbnail_url,permalink,timestamp,username,comments_count}&access_token='.self::ACCESS_TOKEN;
        $client = new \GuzzleHttp\Client([
            'base_uri' => $base_url,
        ]);
        $response = $client->request('GET', $path, []);
        $response_body = (string) $response->getBody();
        
        return $response_body;
    }
}