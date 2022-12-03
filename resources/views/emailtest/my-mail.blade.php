@component('mail::message')
# Introduction

The body of your message.

<h3>{{ $details['title'] }}</h3>
    <p>{{ $details['body'] }}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
