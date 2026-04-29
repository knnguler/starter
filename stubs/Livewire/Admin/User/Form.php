<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;

class Form extends Component
{
    public ?User $user = null;
    public string $name = '';
    public string $email = '';

    public function mount(?User $user = null)
    {
        if ($user && $user->exists) {
            $this->user = $user;
            $this->name = $user->name;
            $this->email = $user->email;
        }
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . ($this->user->id ?? 'NULL'),
        ]);

        if ($this->user && $this->user->exists) {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            session()->flash('status', 'User updated successfully.');
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt('password'), // default
            ]);
            session()->flash('status', 'User created successfully.');
        }

        return redirect()->route('admin.user.index');
    }

    public function render()
    {
        return view('admin.user.form')->layout('layouts.admin');
    }
}
