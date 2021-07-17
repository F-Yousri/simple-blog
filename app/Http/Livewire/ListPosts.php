<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class ListPosts extends Component
{
    public function render()
    {
        $posts = Post::paginate(10);
        return view('livewire.list-posts')->with(['posts' => $posts])->layout('layouts.guest');
    }
}
