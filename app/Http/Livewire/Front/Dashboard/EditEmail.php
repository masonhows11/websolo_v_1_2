<?php

namespace App\Http\Livewire\Front\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class EditEmail extends Component
{

    public $user;
    public $email;

    public function mount()
    {

        $this->user = Auth::user();
        $this->email = $this->user->email;
    }

    protected function rules()
    {
        return [
            'email' => ['required', 'unique:users', 'email'],
        ];
    }

    protected $messages = [
        'email.required' => 'ایمیل  الزامی است',
        'email.unique' => 'ایمیل وارد شده تکراری است',
        'email.email' => 'ایمیل وارد شده معتبر نمی باشد',

    ];

    public function save()
    {
        $this->validate();
        
    }

    public function render()
    {
        return view('livewire.front.dashboard.edit-email')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
