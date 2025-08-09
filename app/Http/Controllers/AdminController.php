<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;
use App\Services\YoutubeAPIHandler;

class AdminController extends Controller
{
    public function index(){
        $videos = (new YoutubeAPIHandler())->getPlaylist();
//        $uploadedVideos = Video::with('categories')->get();

        return view('admin.index',[
            'videos' => $videos,
            'categories' => Category::withCount('videos')->get(),
        ]);
    }
}
