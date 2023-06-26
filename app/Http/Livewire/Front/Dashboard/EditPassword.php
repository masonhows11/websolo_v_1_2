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
        'confirm_password.same' => 'رمز عبور جدید و تکرار ان یکسان نیستند.',

    ];

    public function save()
    {
        $this->validate();

        try {
            if(!Hash::check($this->old_password,$this->user->password)){
                session()->flash('error','رمز عبور فعلی صحیح نمی باشد.');
                return redirect()->back();
            }

            $this->user->password = Hash::make($this->new_password);
            $this->user->save();
            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
            session()->flash('success','تغییر رمز عبور با موفقیت انجام شد.');
            return  redirect('')->route('login.form');
        }catch (\Exception $ex){
            return view('errors_custom.general_error',['error'=>$ex->getMessage()]);
        }




    }

    public function render()
    {
        return view('livewire.front.dashboard.edit-password')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
