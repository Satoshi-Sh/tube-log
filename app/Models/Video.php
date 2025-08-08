<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Category;

class Video extends Model
{
    public function categories():BelongsToMany{
        return $this->belongsToMany(Category::class);
    }

    public function tag($name){
        $category = Category::where('name',$name)->first();
        $this->categories()->attach($category->id);
    }

}
