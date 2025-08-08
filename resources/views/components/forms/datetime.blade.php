@props([
    'label',
    'name',
    'value' => '', // can be Carbon, string, or null
])

@php
    // If a Carbon instance is passed, format it
    if ($value instanceof \Carbon\Carbon) {
        $value = $value->format('Y-m-d\TH:i');
    }

    // Use old input if it exists, otherwise the provided value
    $inputValue = old($name, $value);

    $defaults = [
        'type' => 'datetime-local',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
        'value' => $inputValue,
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }} />
</x-forms.field>
