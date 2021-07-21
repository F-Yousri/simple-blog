<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public User $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,'. $this->user->id,
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $validatedData = $this->validate();

        $this->user->update($validatedData);
        request()->session()->flash('flash.banner', 'User Updated successfuly!');
        request()->session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('users.edit', ['user' => $this->user->id]);
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}
