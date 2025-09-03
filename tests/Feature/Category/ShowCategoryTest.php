<?php

use App\Models\Category;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('Category shows have videos with the category', function () {
$categories = Category::factory()->count(2)->create();
$category = $categories[0];
$videos = Video::factory()->count(3)->create();
foreach ($videos as $video){
$video->categories()->attach($categories->pluck('id'));
}


$response = $this->get(route('categories.index',['category'=>$category]));

$response->assertSee($category->name);
$response->assertStatus(200);
foreach ($videos as $video){
$response->assertSee($video->title);
}
});
