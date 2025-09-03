<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a user can create a category', function () {
    $user = User::factory()->create();
    $response = $this
        ->actingAs($user)
        ->post(route('categories.store'), [
            'name' => 'test',
        ]);
    $response->assertRedirect(route('dashboard.index'));
    $this->assertDatabaseHas('categories', [
        'name' => 'test',
    ]);
});

test('a guest cannot create a category', function () {
    $response = $this
        ->post(route('categories.store'), [
            'name' => 'new category',
        ]);
    $response
        ->assertRedirect(route('login'));
    $this->assertDatabaseMissing('categories', [
        'name' => 'new category',
    ]);
});
