<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminSettings extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-settings')
            ->extends('admin.include.master')
            ->section('admin_main');
    }
}
