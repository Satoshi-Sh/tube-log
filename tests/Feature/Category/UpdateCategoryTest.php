<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a user can update a category', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $response = $this
        ->actingAs($user)
        ->put(route('categories.update', $category), [
            'name' => 'new name',
        ]);
    $response->assertRedirect(route('dashboard.index'));
    $this->assertDatabaseHas('categories', [
        'name' => 'new name',
    ]);
});

test('a guest cannot update a category', function () {
    $category = Category::factory()->create();
    $originalName = $category->name;

    $response = $this
        ->put(route('categories.update', $category), [
            'name' => 'new name',
        ]);
    $response
        ->assertRedirect(route('login'));
    $this->assertEquals($originalName, $category->refresh()->name);
});



