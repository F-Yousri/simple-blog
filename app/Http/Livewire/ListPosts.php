<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ListPosts extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.list-posts', [
            'posts' => Post::with(['user'])->orderByDesc('created_at')->paginate(10),
        ]);
    }
}
