<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a user can create a category', function () {
    $user = User::factory()->create();
    $response = $this
        ->actingAs($user)
        ->post(route('videos.store',['id' => 'OmVTkURR3UY']), [
            'user_id' => User::factory()->create(),
            'title' => 'test',
            'description' => 'test',
            'published_at' => date('Y-m-d H:i:s'),
        ]);
    $response
        ->assertRedirect(route('dashboard.index'));
    $this->assertDatabaseHas('videos', [
        'title' => 'test',
    ]);
});

test('a guest cannot create a video', function () {
    $response = $this
        ->post(route('videos.store',['id' => 'OmVTkURR3UY']), [
            'user_id' => User::factory()->create(),
            'title' => 'test',
            'description' => 'test',
            'published_at' => date('Y-m-d H:i:s'),
        ]);
    $response
        ->assertRedirect(route('login'));
    $this->assertDatabaseMissing('videos', [
        'title' => 'test',
    ]);
});
