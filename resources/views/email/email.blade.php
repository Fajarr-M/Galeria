@component('mail::message')
# Galeria

Hi, Sir   
Thanks For Joining To {{ config('app.name') }}  

@component('mail::button', ['url' => 'http://galeria.test'])
Galeria
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent