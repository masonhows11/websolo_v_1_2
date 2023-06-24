<?php

namespace App\Http\Livewire\Front\Dashboard;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfile extends Component
{

    public $user;
    public $name;
    public $first_name;
    public $last_name;

    public function mount()
    {
      $this->user = Auth::user();
      $this->name = $this->name->name;
      $this->first_name = $this->name->first_name;
      $this->last_name = $this->name->last_name;
    }

    public function save(){

    }

    public function render()
    {
        return view('livewire.front.dashboard.edit-profile')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
