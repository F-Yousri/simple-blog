<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUser extends Component
{
    use WithFileUploads ;

    public $name;
    public $email;
    public $password;
    public $confirmPassword;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'confirmPassword'=> 'required|same:password'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        $validatedData = $this->validate();

        User::create($validatedData);
        request()->session()->flash('flash.banner', 'User added successfuly!');
        request()->session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
