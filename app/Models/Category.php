<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    public function videos():BelongsToMany{
        return $this->belongsToMany(Video::class,'category_video', 'category_id', 'video_id');
    }
}
