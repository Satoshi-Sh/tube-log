<?php

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it lists videos on the index page', function () {
    Category::factory()->count(3)->create();

    $response = $this->get(route('home'));

    $response->assertStatus(200);
    $response->assertSee(Category::first()->name);
});
