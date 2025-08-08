@props([
    'label',
    'name',
    'value' => '',
])

@php
    $inputValue = old($name, $value);

    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
    ];
@endphp

<x-forms.field :$label :$name>
    <textarea class="w-full h-48 p-1" {{ $attributes($defaults) }}>{{ $inputValue }}</textarea>
</x-forms.field>

