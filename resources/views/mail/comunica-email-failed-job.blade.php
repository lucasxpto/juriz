<x-mail::message>
# JURIZ - Comunica - Falha no Job

Falha no job

<x-mail::button :url="route('dashboard')">
    Dashboard
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
