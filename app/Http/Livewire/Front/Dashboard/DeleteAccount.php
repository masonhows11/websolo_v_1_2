<?php

namespace App\Http\Livewire\Front\Dashboard;

use Livewire\Component;

class DeleteAccount extends Component
{
    public function render()
    {
        return view('livewire.front.dashboard.delete-account')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
