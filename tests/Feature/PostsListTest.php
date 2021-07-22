<?php

namespace Tests\Feature;

use App\Http\Livewire\ListPosts;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PostsListTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->has(Post::factory()->count(10))->count(20)->create();
    }
    /**
     * @test
     *
     */
    public function it_hides_edit_and_create_from_guests()
    {
        Livewire::test(ListPosts::class)
            ->assertDontSee('delete')
            ->assertDontSee('Submit');
    }

    /**
     * @test
     *
     */
    public function it_allows_edit_and_create_for_users()
    {
        $this->actingAs(User::factory()->create());

        Livewire::test(ListPosts::class)
            ->assertSee('delete')
            ->assertSee('Submit');
    }

    /**
     * @test
     *
     */
    public function it_lists_posts_paginated_by_10()
    {
        $availablePosts = Post::orderByDesc('created_at')->limit(10)->get();
        $unavailablePost = Post::orderByDesc('created_at')->offset(10)->limit(1)->get();
        Post::where('id', '>', 0)->count();

        Livewire::test(ListPosts::class)
            ->assertSeeInOrder($availablePosts->pluck('body')->toArray())
            ->assertDontSee($unavailablePost->first()->body);
    }
}
