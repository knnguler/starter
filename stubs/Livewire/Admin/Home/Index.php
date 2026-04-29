<?php

namespace App\Livewire\Admin\Home;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('admin.home.index', [
            'totalUsers' => User::count(),
            'recentUsers' => User::latest()->limit(5)->get(),
        ])->layout('layouts.admin');
    }
}
