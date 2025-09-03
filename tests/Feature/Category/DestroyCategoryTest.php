<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('a user can delete a category', function () {
    $category = Category::factory()->create();
    $user = User::factory()->create();
    $response = $this
        ->actingAs($user)
        ->delete(route('categories.destroy', ['category'=>$category]));
    $response->assertRedirect(route('dashboard.index'));
    $this->assertDatabaseMissing('categories', [
        'name' => $category->name,
    ]);
});

test('a guest cannot delete a category', function () {
    $category = Category::factory()->create();
    $response = $this
        ->delete(route('categories.destroy', ['category'=>$category]));
    $response->assertRedirect(route('login'));
    $this->assertDatabaseHas('categories', [
        'name' => $category->name,
    ]);
});

