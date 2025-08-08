<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request){
        $attributes = request()-> validate([
            'name' => ['required', 'string','min:1','max:255']
        ]);
        try {
            Category::create($attributes);
        } catch (QueryException $e){
            return back()->withErrors(['name'=>'The category exists in the database']);
        }

        return redirect('/dashboard')->with('success','Category Created');
    }

}
