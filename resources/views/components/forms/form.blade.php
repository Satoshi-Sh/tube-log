@php
    $method = strtoupper($attributes->get('method', 'GET'));
    $formMethod = in_array($method, ['GET', 'POST']) ? $method : 'POST';
@endphp

<form {{ $attributes->merge(['class' => 'max-w-2xl mx-auto space-y-6'])->except('method')->merge(['method' => strtolower($formMethod)]) }}>
    @if ($method !== 'GET')
        @csrf
        @method($method)
    @endif

    {{ $slot }}
</form>
