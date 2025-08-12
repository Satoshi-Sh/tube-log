<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class YoutubeAPIHandler
{
    protected string $apiKey;
    protected string $playlistId;

    public function __construct()
    {
        $this->apiKey = config('services.youtube.api_key');
        $this->playlistId = config('services.youtube.playlist_id');
    }

    public function getVideoById(string $videoId): ?array
    {
        $response = Http::get('https://www.googleapis.com/youtube/v3/videos', [
            'part' => 'snippet,contentDetails,statistics',
            'id' => $videoId,
            'key' => $this->apiKey,
        ]);

        if ($response->successful()) {
            $items = $response->json()['items'] ?? [];
            return $items[0] ?? null;
        }

        Log::error('YouTube API failed to fetch video', [
            'videoId' => $videoId,
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return null;
    }

    public function getPlaylist(): array
    {
        $response = Http::get('https://www.googleapis.com/youtube/v3/playlistItems', [
            'part' => 'snippet',
            'maxResults' => 50,
            'playlistId' => $this->playlistId,
            'key' => $this->apiKey,
        ]);

        if ($response->successful()) {
            $items = $response->json()['items'] ?? [];
            return array_filter($items, function ($item) {
                return isset($item['snippet']['resourceId']['videoId']);
          });
        }

        Log::error('YouTube API failed', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return [];
    }
}
