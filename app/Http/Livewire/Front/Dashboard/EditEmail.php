<?php

namespace App\Http\Livewire\Front\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditEmail extends Component
{

    public $user;
    public $email;

    public function mount(){

        $this->user = Auth::user();
        $this->email = $this->user->email;
    }


    public function render()
    {
        return view('livewire.front.dashboard.edit-email')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
