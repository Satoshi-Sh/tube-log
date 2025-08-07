<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index(){
        $apiKey = config('services.youtube.api_key');
        $playlistId = config('services.youtube.playlist_id');
        $response = Http::get('https://www.googleapis.com/youtube/v3/playlistItems', [
            'part' => 'snippet',
            'maxResults' =>50,
            'playlistId' => $playlistId,
            'key' => $apiKey,
        ]);

        if ($response->successful()) {
            $videos = $response->json()['items'] ?? [];
        } else {
            // Log the error or handle it gracefully
            logger()->error('YouTube API failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            $videos = [];}

        return view('admin.index',['videos'=>$videos]);
    }
}
