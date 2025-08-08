<?php

namespace App\Http\Controllers;
use App\Services\YoutubeAPIHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function create($id){
      $video = (new YoutubeAPIHandler())->getVideoById($id)['snippet'];
      return view('videos.create', compact('video','id'));
    }

    public function store($id, Request $request){
        $attributes = $request->merge(['id'=>$id])->validate([
            'id' => ['required', 'string', 'size:11', 'regex:/^[A-Za-z0-9_-]{11}$/'], // youtube id
            'title'=> 'required',
            'description' => ['required',],
            'published_at'=> ['required', 'date'],
            'categories' => ['array'],
            'categories.*' => ['string', 'max:255'],
        ]);
        $attributes['is_featured'] = $request->has('is_featured');

        $video = Auth::user()->videos()->create(Arr::except($attributes, 'categories'));

        if ($attributes['categories']?? false){
            foreach ($attributes['categories'] as $category){
                $video->categories()->attach($category);
            }
        }
        return redirect("/dashboard");
    }
}
