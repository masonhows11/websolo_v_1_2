<x-mail::message>

    <x-header::panel>
        ایمیل فعال سازی حساب کاربری
    </x-header::panel>

    <x-mail::panel>
         کاربر عزیز :{{ $user->name }}
    </x-mail::panel>

    <x-mail::panel>
        کد فعال سازی : {{ $code  }}
    </x-mail::panel>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
