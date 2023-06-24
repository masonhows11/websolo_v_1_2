<?php

namespace App\Http\Livewire\Front\Dashboard;

use Livewire\Component;

class EditPassword extends Component
{

    public $email;
    public $old_password;
    public $new_password;
    public $confirm_password;

    public function mount(){

    }

    public function save(){

    }

    public function render()
    {
        return view('livewire.front.dashboard.edit-password')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
