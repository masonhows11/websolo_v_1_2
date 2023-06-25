<?php

namespace App\Http\Livewire\Front\Dashboard;

use App\Events\RegisterUserEvent;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class EditEmail extends Component
{

    public $user;
    public $email;


    public function mount()
    {

        $this->user = User::where('email',Auth::user()->email)->first();
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

        $code = Str::random(6);

        $this->user->email = $this->email;
        $this->user->code = $code;
        $this->user->email_verified_at = null;
        $this->user->updated_at = Carbon::now();
        $this->user->save();



        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        RegisterUserEvent::dispatch($this->user,$code);
        session()->flash('success','ایمیل فعال سازی با موفقبت ارسال شد.');
        return redirect()->route('verify.email');

    }

    public function render()
    {
        return view('livewire.front.dashboard.edit-email')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
