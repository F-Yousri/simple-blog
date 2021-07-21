<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    public $newPost;

    public function createPost()
    {
        $this->validate(['newPost' => 'required']);
        Post::create(
            [
                'body' => $this->newPost,
                'user_id' => auth()->user()->id,
            ]);
        request()->session()->flash('flash.banner', 'Post created successfuly!');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => Post::with(['user'])->orderByDesc('created_at')->paginate(10),
        ]);
    }
}
