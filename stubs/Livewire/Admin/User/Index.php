<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $status = ''; // all, verified, unverified
    public string $period = ''; // all, today, week, month
    public string $type = ''; // all, admin, user
    public string $sortBy = 'created_at';
    public string $sortDir = 'desc';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function setFilter(string $key, string $value): void
    {
        if (property_exists($this, $key)) {
            $this->$key = $value;
        }
        $this->resetPage();
    }

    public function sort(string $column): void
    {
        if ($this->sortBy === $column) {
            $this->sortDir = $this->sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDir = 'asc';
        }
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, fn ($q) => $q->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            }))
            ->when($this->status, function ($q) {
                if ($this->status === 'verified') {
                    return $q->whereNotNull('email_verified_at');
                }
                if ($this->status === 'unverified') {
                    return $q->whereNull('email_verified_at');
                }
            })
            ->when($this->period, function ($q) {
                if ($this->period === 'today') {
                    return $q->whereDate('created_at', now()->toDateString());
                }
                if ($this->period === 'week') {
                    return $q->where('created_at', '>=', now()->startOfWeek());
                }
                if ($this->period === 'month') {
                    return $q->where('created_at', '>=', now()->startOfMonth());
                }
            })
            ->when($this->type, function ($q) {
                if ($this->type === 'admin') {
                    return $q->where('email', 'like', '%admin%');
                }
                if ($this->type === 'user') {
                    return $q->where('email', 'not like', '%admin%');
                }
            })
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate(15);

        return view('admin.user.index', [
            'users' => $users,
        ])->layout('layouts.admin');
    }
}
