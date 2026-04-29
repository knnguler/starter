<?php

namespace App\Livewire\Home;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Anasayfa')]
class Index extends Component
{
    public bool $hideNavbar = false;
    public bool $hideFooter = false;

    public function toggleNavbar()
    {
        $this->hideNavbar = !$this->hideNavbar;
    }

    public function render()
    {
        return view('home.index')
            ->layout('layouts.app', [
                'config' => [
                    'title' => 'Hoş Geldiniz',
                    'description' => 'Modern ve şık başlangıç kiti anasayfası.',
                ],
                'hideNavbar' => $this->hideNavbar,
                'hideFooter' => $this->hideFooter,
            ]);
    }
}
