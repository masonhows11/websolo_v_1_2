<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class ListUsersForPerm extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.list-users-for-perm')
            ->extends('admin.include.master')
            ->section('admin_main')
            ->with(['users' => Admin::paginate(5)]);
    }
}
