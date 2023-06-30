<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class ListUsersForRole extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.list-users-for-role')
            ->extends('admin.include.master')
            ->section('admin_main')
            ->with(['users' => Admin::paginate(5)]);
    }
}
