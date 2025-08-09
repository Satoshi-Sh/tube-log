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
        return view('videos.index',
        ['categories' => Category::withCount('videos')->get(),]
        );
    }
    public function create($id){
      $video = (new YoutubeAPIHandler())->getVideoById($id)['snippet'];
      $categories = Category::withCount('videos')->get();
      $categories =  $categories->pluck('name')->toArray();
      return view('videos.create', compact('video','id','categories'));
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
                $video->tag($category);
            }
        }
        return redirect("/dashboard");
    }
    public function edit(Request $request, Video $video){
        $video->load('categories');
        $selected = $video->categories->pluck('name')->toArray();
        $categories = Category::all()->pluck('name')->toArray();;
        return view('videos.edit', compact('video','categories', 'selected'));
    }
    public function update(Request $request , Video $video){
        dd($video);
    }
}
