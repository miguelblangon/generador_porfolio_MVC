<x-mail::message>
# Envio de codigo de acceso
<p>Se ha solicitado un código de acceso para entrar en Porfolio.</p>
<p><b>Codigo de Acceso:</b> {{ $number }} </p>
<p>Con dicho código podra autenticarse, el código es valido por 5 Minutos </p>
Gracias por su paciencia,<br>
{{ config('app.name') }}
</x-mail::message>






