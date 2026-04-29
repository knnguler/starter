<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;

class Index extends Component
{
    public string $activeTab = 'general';

    public $general = [
        'site_name' => '',
        'site_description' => '',
    ];

    public $social = [
        'facebook_url' => '',
        'twitter_url' => '',
    ];

    public function mount()
    {
        $this->general['site_name'] = Setting::get('site_name', 'My Laravel App');
        $this->general['site_description'] = Setting::get('site_description', '');
        
        $this->social['facebook_url'] = Setting::get('facebook_url', '');
        $this->social['twitter_url'] = Setting::get('twitter_url', '');
    }

    public function save()
    {
        foreach ($this->general as $key => $value) {
            Setting::set($key, $value);
        }
        foreach ($this->social as $key => $value) {
            Setting::set($key, $value);
        }

        session()->flash('status', 'Settings successfully updated.');
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('admin.settings.index')->layout('layouts.admin');
    }
}
