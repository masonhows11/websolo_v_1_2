<?php

namespace App\Http\Livewire\Admin;

use App\Notifications\AdminAuthNotification;
use App\Services\GenerateToken;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminEmail extends Component
{
    public $name;
    public $email;


    public function mount()
    {
        $info = Auth::guard('admin')->user();
        $this->name = $info->name;
        $this->email = $info->email;

    }

    protected function rules()
    {
        return [
            'email' => ['unique:admins','required']
        ];
    }


    protected $messages =
        [
            'email.unique' => 'ایمیل وارد شده تکراری است',
            'email.required' => 'ایمیل الزامی است',
        ];

    public function editMobile()
    {
        $this->validate();
        $code = GenerateToken::generateToken();

        try {
            $admin = Auth::user();
            $admin->email = $this->email;
            $admin->code = $code;
            $admin->email_verified_at = null;
            $admin->remember_token = null;
            $admin->save();

            $admin->notify(new AdminAuthNotification($admin->email,$code));

            session()->flash('success', 'کد فعال سازی به ایمیل ارسال شد');
            return redirect()->route('admin.validate.email.form');
        }catch (\Exception $ex){
            return view('errors_custom.model_store_error',['error'=>$ex->getMessage()]);
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-email')
            ->extends('admin.include.master')
            ->section('admin_main');
    }
}
