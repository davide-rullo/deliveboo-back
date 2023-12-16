<x-mail::message>

    <x-mail::button :url="'http://localhost:5174'">
        Go to the App
    </x-mail::button>
    <x-mail::panel>
        New Order from:
    </x-mail::panel>



    Name: {{ $lead->customer_name }}
    Email: {{ $lead->customer_email }}
    Phone: {{ $lead->customer_phone }}
    Address: {{ $lead->customer_address }}
    Message: {{ $lead->customer_message }}


    Thanks,
    {{ config('app.name') }}






</x-mail::message>
