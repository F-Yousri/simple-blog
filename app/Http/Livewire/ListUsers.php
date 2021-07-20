<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.list-users', ['users' => User::orderByDesc('created_at')->paginate(10)]);
    }

    public function delete($userId)
    {
        User::find($userId)->delete();
    }
}
