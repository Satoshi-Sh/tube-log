<?php

namespace App\Http\Controllers;
use App\Services\YoutubeAPIHandler;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Reference;

class VideoController extends Controller
{
    public function create($id){
      $video = (new YoutubeAPIHandler())->getVideoById($id)['snippet'];
      return view('videos.create', compact('video','id'));
    }

    public function store($id, Request $request){
        dd($request);
        // validate requests
        // store
    }
}
