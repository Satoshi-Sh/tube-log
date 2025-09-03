<?php

use App\Models\User;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a user can delete a video', function () {
    $user = User::factory()->create();
    $video = Video::factory()->create();

    $response = $this
        ->actingAs($user)
        ->delete(route('videos.destroy',['video' => $video]));
    $response
        ->assertRedirect(route('dashboard.index'));
    $this->assertDatabaseMissing('videos', [
        'title' => $video->title,
    ]);
});

test('a guest cannot delete a video', function () {
    $video = Video::factory()->create();
    $response = $this
        ->delete(route('videos.destroy',['video' => $video]));
    $response
        ->assertRedirect(route('login'));
    $this->assertDatabaseHas('videos', [
        'title' => $video->title,
    ]);
});
