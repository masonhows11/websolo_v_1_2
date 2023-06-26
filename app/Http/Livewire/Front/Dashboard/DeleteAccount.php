<?php

namespace App\Http\Livewire\Front\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteAccount extends Component
{

    public $user;

    public function mount(){

        $this->user = Auth::user();
    }


    public function delete(){

        $this->user->delete();
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        session()->flash('success','حساب کاربری شما با موفقیت حذف شد.');
        redirect()->route('login.form');

    }

    public function render()
    {
        return view('livewire.front.dashboard.delete-account')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
