<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    public $newPost;
    public $edittingPostId;
    public $edittingPost;

    public function createPost()
    {
        $this->validate(['newPost' => 'required']);
        Post::create(
            [
                'body' => $this->newPost,
                'user_id' => auth()->user()->id,
            ]
        );
        $this->newPost = null;
        request()->session()->flash('flash.banner', 'Post created successfuly!');
        request()->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('posts.index');
    }

    public function editPost($id)
    {
        $this->edittingPost = Post::find($id)->body;
        $this->edittingPostId = $id;
        $this->resetValidation();
    }

    public function updatePost()
    {
        $this->validate(['edittingPost' => 'required']);

        Post::whereId($this->edittingPostId)->update(['body' => $this->edittingPost]);
        $this->edittingPostId = null;
        request()->session()->flash('flash.banner', 'Post updated successfuly!');
        request()->session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('posts.index');
    }

    public function cancelEdit()
    {
        $this->edittingPostId = null;
    }

    public function delete($id)
    {
        Post::whereId($id)->delete();
        request()->session()->flash('flash.banner', 'Post deleted successfuly!');
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
