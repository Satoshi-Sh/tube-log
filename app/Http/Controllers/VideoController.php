<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Video;
use App\Services\YoutubeAPIHandler;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index(){
        $videos = Video::latest()->with('categories')->get()->groupBy('is_featured');
        return view('videos.index',
            [
                'featuredVideos' => $videos[1],
                'videos' => $videos[0],
                'categories' => Category::withCount('videos')->get(),
            ]
        );
    }
    public function show(Video $video){
        $video->load('categories');
        return view('videos.show', compact('video'));
    }
    public function create($id){
      $video = (new YoutubeAPIHandler())->getVideoById($id)['snippet'];
      $categories = Category::withCount('videos')->get();
      $categories =  $categories->all();
      return view('videos.create', compact('video','id','categories'));
    }

    public function store($id, Request $request){
        $attributes = $request->merge(['id'=>$id])->validate([
            'id' => ['required', 'string', 'size:11', 'regex:/^[A-Za-z0-9_-]{11}$/'], // youtube id
            'title'=> 'required',
            'description' => ['required',],
            'published_at'=> ['required', 'date'],
            'categories' => ['array'],
            'categories.*' => ['int', 'max:255'],
        ]);
        $attributes['is_featured'] = $request->has('is_featured');

        $video = Auth::user()->videos()->create(Arr::except($attributes, 'categories'));

        $video->categories()->sync($attributes['categories'] ?? []);

        return redirect("/dashboard");
    }
    public function edit(Request $request, Video $video){
        $video->load('categories');
        $selected = $video->categories->pluck('name')->toArray();
        $categories = Category::all();
        return view('videos.edit', compact('video','categories', 'selected'));
    }
    public function update(Request $request , Video $video){
        $attributes = $request->validate([
            'title'=> 'required',
            'description' => ['required',],
            'published_at'=> ['required', 'date'],
            'categories' => ['array'],
            'categories.*' => ['integer', 'exists:categories,id'],
        ]);
        $attributes['is_featured'] = $request->has('is_featured');
        $video->update(Arr::except($attributes, 'categories'));

        $video->categories()->sync($attributes['categories'] ?? []);

        return redirect("/dashboard");

    }
    public function destroy(Video $video){
        $video-> delete();
        return redirect("/dashboard");
    }
}
