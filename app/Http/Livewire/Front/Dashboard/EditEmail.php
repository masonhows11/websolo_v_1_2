<?php

namespace App\Http\Livewire\Front\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditEmail extends Component
{

    public $user;

    public function mount(){

        $this->user = Auth::user();
    }


    public function render()
    {
        return view('livewire.front.dashboard.edit-email')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
