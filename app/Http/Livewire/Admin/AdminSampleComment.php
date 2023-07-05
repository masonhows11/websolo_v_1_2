<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sample;
use Livewire\Component;

class AdminSampleComment extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-sample-comment')
            ->extends('admin.include.master')
            ->section('admin_main')
            ->with(['samples'=>Sample::paginate(10)]);
    }
}
