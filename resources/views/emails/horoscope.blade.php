<x-mail::message>
Dear user,
your horoscope for today is: <br> 
{{$horoscope}}



Thanks,<br>
{{ config('app.name') }}
</x-mail::message>