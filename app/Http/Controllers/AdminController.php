<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use App\Services\YoutubeAPIHandler;

class AdminController extends Controller
{
    public function index(){
        $uploadedVideos = Video::with('categories')
            ->orderBy('published_at', 'desc')
            ->get();
        $uploadedVideosGrouped = $uploadedVideos->groupBy('is_featured');
        $uploadedVideoIds = $uploadedVideos->pluck('id')->toArray();
        $newVideos = (new YoutubeAPIHandler())->getPlaylist();
        $filteredNewVideos = collect($newVideos)->reject(function ($video) use ($uploadedVideoIds) {
            return in_array($video['snippet']['resourceId']['videoId'], $uploadedVideoIds);
        })->values();
        return view('admin.index',[
            'featuredVideos' =>$uploadedVideosGrouped[1] ?? [],
            'uploadedVideos' => $uploadedVideosGrouped[0] ?? [],
            'newVideos' => $filteredNewVideos,
            'categories' => Category::withCount('videos')->get(),
        ]);
    }
}
