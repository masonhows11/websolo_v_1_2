<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;

class Contact extends Component
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

    public function save()
    {

        $this->validate();

        try {

            \App\Models\Contact::create([
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message
            ]);

            $this->name = '';
            $this->email = '';
            $this->message = '';

            $this->dispatchBrowserEvent('show-result',
                ['type' => 'success',
                    'message' => 'پیام شما با موفقیت ارسال شد.']);

        } catch (\Exception $ex) {
            return view('errors_custom.model_store_error');
        }

        return null;
    }
    public function render()
    {
        return view('livewire.front.contact');
    }
}
