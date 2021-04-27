@component('mail::message')
# Welcome

Hi, Sir <br>
Thanks For Joining To {{ config('app.name') }}  

@component('mail::button', ['url' => 'http://galeria.test'])
Galeria
@endcomponent

Thanks,<br>
{{ config('app.name') }}
<br>
<div class="section text-center fs-1">© {{ date('Y') }} {{ config('app.name') }}. All Rights Reseved
<br>
<div class="sosmed">
<a href="instagram.com/fmhabil._"><img src="https://www.transparentpng.com/thumb/logo-instagram/z75gfy-instagram-logo-png.png" alt="instagram logo png @transparentpng.com" style="width: 30px; margin-right:10px;"></a>
<a href="twitter.com/mlkywayy_"><img src="https://www.transparentpng.com/thumb/twitter/twitter-bird-logo-pictures-0.png" alt="twitter bird logo pictures @transparentpng.com" style="width: 30px; margin-right:10px;"></a></div></div>
@endcomponent