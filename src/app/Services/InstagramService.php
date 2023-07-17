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
        $this->userId = config('services.instagram.id');
        $this->postCount = '9';
        $this->targetUser = config('services.instagram.target_user');
        $this->accessToken = config('services.meta.unlimit_token');
    }

    public function getInstagramRequestBody()
    {
        $base_url = 'https://graph.facebook.com/v17.0/';
        $path = $this->userId . '?fields=business_discovery.username(' . $this->targetUser . '){media.limit(' . $this->postCount .'){media_type,media_url,permalink}}&access_token=' . $this->accessToken;
        
        $client = new \GuzzleHttp\Client([
            'base_uri' => $base_url,
        ]);
        $response = $client->request('GET', $path, []);
        $response_body = (string) $response->getBody();

        return $response_body;
    }
}