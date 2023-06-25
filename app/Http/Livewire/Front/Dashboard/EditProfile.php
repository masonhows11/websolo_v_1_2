<?php

namespace App\Http\Livewire\Front\Dashboard;


use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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
        $this->name = $this->user->name;
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
    }

    protected function rules()
    {
        return [
            'name' => ['required', Rule::unique('users')->ignore($this->user->id), 'min:2', 'max:30'],
            'first_name' => ['nullable', 'min:2', 'max:30'],
            'last_name' => ['nullable', 'min:2', 'max:30'],
        ];
    }

    protected $messages = [
        'name.required' => 'نام کاربری الزامی است',
        'name.unique' => 'نام کاربری تکراری است',
        'name.min' => 'حداقل ۲ کاراکتر وارد کنید',
        'name.max' => 'حداکثر تعداد کاراکتر مجاز',


        'first_name.min' => 'حداقل ۲ کاراکتر وارد کنید',
        'first_name.max' => 'حداکثر تعداد کاراکتر مجاز',


        'last_name.min' => 'حداقل ۲ کاراکتر وارد کنید',
        'last_name.max' => 'حداکثر تعداد کاراکتر مجاز',

    ];

    public function save()
    {
        $this->validate();

        try {

            $this->user->name = $this->name;
            $this->user->first_name = $this->first_name;
            $this->user->last_name = $this->last_name;
            $this->user->save();

            $this->dispatchBrowserEvent('show-result',
                ['type'=>'success' ,
                 'message'=>'عملیات با موفقیت انجام شد.']);
        }catch (\Exception $ex){

            $this->dispatchBrowserEvent('show-result',
                ['type'=>'error' ,
                    'message'=>'عملیات با موفقیت انجام نشد.']);
        }


    }

    public function render()
    {
        return view('livewire.front.dashboard.edit-profile')
            ->extends('front.user_profile.master_dashboard')
            ->section('info_dash_left_side');
    }
}
