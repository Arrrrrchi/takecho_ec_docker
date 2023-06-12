<?php

namespace App\Services;

class InstagramService
{
    private $userId;
    private $postCount;
    private $targetUser;
    private $accessToken;

    public function __construct()
    {
        $this->userId = env('INSTA_BUSINESS_ID');
        $this->postCount = '9';
        $this->targetUser = env('INSTA_TARGET_USER');
        $this->accessToken = env('META_ACCESS_TOKEN_UNLIMIT');
    }

    public function getInstagramRequestBody()
    {
        $base_url = 'https://graph.facebook.com/v15.0/';
        $path = $this->userId . '?fields=business_discovery.username(' . $this->targetUser . '){media.limit(' . $this->postCount .'){media_type,media_url,permalink}}&access_token=' . $this->accessToken;
        
        $client = new \GuzzleHttp\Client([
            'base_uri' => $base_url,
        ]);
        $response = $client->request('GET', $path, []);
        $response_body = (string) $response->getBody();

        return $response_body;
    }
}