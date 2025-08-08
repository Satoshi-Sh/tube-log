<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\YoutubeAPIHandler;

class AdminController extends Controller
{
    public function index(){
        $videos = (new YoutubeAPIHandler())->getPlaylist();
        return view('admin.index',[
            'videos' => $videos,
            'categories' => Category::withCount('videos')->get(),
        ]);
    }
}
