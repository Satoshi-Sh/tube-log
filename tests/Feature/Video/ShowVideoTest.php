<?php

use App\Models\Category;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Video shows have video info', function () {
    $categories = Category::factory()->count(2)->create();
    $video = Video::factory()->create();
    $video->categories()->attach($categories->pluck('id'));

    $response = $this->get(route('video',['video'=>$video]));

    $response->assertStatus(200);

    $response->assertSee($video->id);
    $response->assertSee($video->description);
    $response->assertSee($video->published_at->format('Y-m-d H:i:s'));

    foreach ($categories as $category) {
        $response->assertSee($category->name);
    }
});
