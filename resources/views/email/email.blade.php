@component('mail::message')
# Coba Mailtrap

Hi, **{{$name}}**    
Thanks For Joining To Galeria    

@component('mail::button', ['url' => 'http://galeria.test'])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
