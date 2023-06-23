<x-mail::message>

    <x-mail::panel>
        ایمیل فعال سازی حساب کاربری
    </x-mail::panel>

    <x-mail::panel>
         کاربر عزیز :{{ $user->name }}
    </x-mail::panel>

    <x-mail::panel>
        کد فعال سازی : {{ $code  }}
    </x-mail::panel>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
