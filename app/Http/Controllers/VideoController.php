<?php

namespace App\Http\Controllers;
use App\Services\YoutubeAPIHandler;

class VideoController extends Controller
{
    public function create($id){
      $video = (new YoutubeAPIHandler())->getVideoById($id)['snippet'];
      return view('videos.create', compact('video'));
    }
}
