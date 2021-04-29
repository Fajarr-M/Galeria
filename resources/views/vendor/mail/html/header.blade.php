<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Galeria')
<div class="logo" style="font-size: 40px; font-weight: bold;">Galeria</div>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
