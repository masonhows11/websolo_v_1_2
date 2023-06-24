<?php

namespace App\Http\Livewire\Front\Dashboard;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.front.dashboard.dashboard')
            ->extends('front.user_profile.master_dashboard')->section('info_dash_left_side');
    }
}
