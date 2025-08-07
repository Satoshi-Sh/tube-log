<?php

namespace App\Http\Controllers;

use App\Services\YoutubeAPIHandler;

class AdminController extends Controller
{
    public function index(){
        $videos = (new YoutubeAPIHandler())->getPlaylist();
        return view('admin.index',compact('videos'));
    }
}
