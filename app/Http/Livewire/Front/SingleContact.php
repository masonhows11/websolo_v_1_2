<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class SingleContact extends Component
{

    public $name;
    public $email;
    public $message;

    protected function rules()
    {
        return [
            'name' => ['required', 'unique:users,name', 'min:2', 'max:30'],
            'email' => ['required', 'unique:users,email'],
            'message' => ['required', 'min:10', 'max:500']
        ];
    }

    protected $messages = [
        'name.required' => 'نام الزامی است',
        'name.min' => 'حداقل ۲ کاراکتر وارد کنید',
        'name.max' => 'حداکثر تعداد کاراکتر مجاز',

        'email.required' => 'نام مجوز الزامی است',
        'email.unique' => 'ایمیل تکراری است',


        'message.required' => 'نام مجوز الزامی است',
        'message.min' => 'حداقل ۲ کاراکتر وارد کنید',
        'message.max' => 'حداکثر تعداد کاراکتر مجاز',

    ];

    public function save(){

    }

    public function render()
    {
        return view('livewire.front.single-contact')
            ->extends('front.include.master_front')
            ->section('main_content');
    }
}
