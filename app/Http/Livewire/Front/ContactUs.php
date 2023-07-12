<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Contact;

class ContactUs extends Component
{

    public $name;
    public $email;
    public $message;

    protected function rules()
    {
        return [
            'name' => ['required', 'min:2', 'max:30'],
            'email' => ['required', 'unique:contacts,email'],
            'message' => ['required', 'min:10', 'max:500']
        ];
    }

    protected $messages = [
        'name.required' => 'نام الزامی است',
        'name.min' => 'حداقل ۲ کاراکتر وارد کنید',
        'name.max' => 'حداکثر تعداد کاراکتر مجاز',

        'email.required' => 'ایمیل الزامی است',
        'email.unique' => 'ایمیل تکراری است',

        'message.required' => 'متن پیام الزامی است',
        'message.min' => 'حداقل ۱۰ کاراکتر وارد کنید',
        'message.max' => 'حداکثر تعداد کاراکتر مجاز',
    ];

    public function save()
    {
        $this->validate();
        try {
            Contact::create([
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
        return view('livewire.front.contact-us');
    }
}
