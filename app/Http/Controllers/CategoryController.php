<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category){
        $category->load('videos');
        return view('categories.show', [
            'category' => $category,
            'videos' => $category->videos
        ]);
    }
    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $attributes = request()-> validate([
            'name' => ['required', 'string','min:1','max:255']
        ]);
        try {
            $category=Category::create($attributes);
            $message= $category->name . ' has been created';
            return redirect('/dashboard')->with('success',$message);
        } catch (QueryException $e){
            return back()->withErrors(['name'=>'The category exists in the database']);
        }
    }

    public function edit(Category $category){
        return view('categories.edit',['category'=>$category]);
    }

    public function update(Request $request, Category $category){
        $attributes = request()->validate([
            'name' => ['required', 'string','min:1','max:255']
        ]);
        $category->update($attributes);
        $message= $category->name . ' has been updated';
        return redirect('/dashboard')->with('success', $message);
    }

    public function destroy(Category $category){
        $category-> delete();
        $message= $category->name . ' has been deleted';
        return redirect('/dashboard')->with('success', $message);
    }
}
