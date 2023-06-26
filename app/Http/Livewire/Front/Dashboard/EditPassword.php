<?php

namespace App\Http\Livewire\Front\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditPassword extends Component
{

    public $user;
    public $email;
    public $old_password;
    public $new_password;
    public $confirm_password;

    public function mount()
    {
        $this->user = Auth::user();
        $this->email = $this->user->email;
    }

    protected function rules()
    {
        return [
            'email' => ['required', 'exists:users', 'email'],
            'old_password' => ['required', 'min:6', 'max:20'],
            'new_password' => ['required', 'min:6', 'max:20'],
            'confirm_password' => ['required','same:new_password' ,'min:6', 'max:20']

        ];
    }

    protected $messages = [
        'email.required' => 'ایمیل  الزامی است.',
        'email.unique' => 'ایمیل وارد شده تکراری است.',
        'email.email' => 'ایمیل وارد شده معتبر نمی باشد.',

        'old_password.required' => 'رمز عبور فعلی الزامی است.',
        'old_password.min:6' => 'حداقل ۶ کاراکتر وارد کنید.',
        'old_password.max:20' => 'حداکثر ۲۰ کاراکتر باشد.',


        'new_password.required' => 'رمز عبور جدید الزامی است.',
        'new_password.min:6' => 'حداقل ۶ کاراکتر وارد کنید.',
        'new_password.max:20' => 'حداکثر ۲۰ کاراکتر باشد.',
        'new_password.confirm' => 'رمز عبور و تکرار آن یکسان نیستند.',

        'confirm_password.required' => 'تکرار رمز عبور الزامی است.',
        'confirm_password.min:6' => 'حداقل ۶ کاراکتر وارد کنید.',
        'confirm_password.max:20' => 'حداکثر ۲۰ کاراکتر باشد.',

    ];

    public function save()
    {
        $this->validate();

        if(Hash::check($this->old_password,$this->user->password)){
            dd('old pass ok');
        }
        dd('old pass not ok');


    }

    public function render()
    {
        return view('livewire.front.dashboard.edit-password')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
