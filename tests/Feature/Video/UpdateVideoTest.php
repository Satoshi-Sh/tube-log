<?php

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a user can update a video', function () {
    $user = User::factory()->create();
    $video = Video::factory()->create();

    $response = $this
        ->actingAs($user)
        ->put(route('videos.update',['video' => $video]), [
            'user_id' => $video->user_id,
            'title' => 'new title',
            'description' => $video->description,
            'published_at' => $video->published_at,
        ]);
    $response
        ->assertRedirect(route('dashboard.index'));
    $this->assertDatabaseHas('videos', [
        'title' => 'new title',
    ]);
});

test('a guest cannot update a video', function () {
    $video = Video::factory()->create();
    $response = $this
        ->put(route('videos.update',['video' => $video]), [
            'user_id' => $video->user_id,
            'title' => 'new title',
            'description' => $video->description,
            'published_at' => $video->published_at,
        ]);
    $response
        ->assertRedirect(route('login'));
    $this->assertDatabaseMissing('videos', [
        'title' => 'new title',
    ]);
});
