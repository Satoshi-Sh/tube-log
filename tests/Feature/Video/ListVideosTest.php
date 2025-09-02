<?php

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('it lists videos on the index page', function () {
Video::factory()->count(3)->create();

$response = $this->get(route('home'));

$response->assertStatus(200);
$response->assertSee(Video::first()->title);
});

