<?php

namespace App\Services;

class YoutubeService
{
    private $apiKey;
    private $playListId;
    private $maxResult;

    public function __construct()
    {
        $this->apiKey = config('services.youtube.api');
        $this->playListId = config('services.youtube.play_list_id');
        $this->maxResult = '4'; // 取得する件数
    }

    public function getYoutubeRequestBody()
    {
        $base_url = 'https://www.googleapis.com/youtube/v3/playlistItems';
        $path = '?part=snippet&maxResults='. $this->maxResult . '&playlistId=' . $this->playListId .'&key='. $this->apiKey;
        
        // GuzzleHttpクライアントのインスタンスを作成
        $client = new \GuzzleHttp\Client([
            'base_uri' => $base_url,
        ]);

        // GuzzleHttpクライアントを使用してAPIリクエストを送信し、レスポンスを受け取る
        $response = $client->request('GET', $path, []);

        // レスポンスボディを文字列として取得
        $response_body = (string) $response->getBody();

        return $response_body;
    }
}
