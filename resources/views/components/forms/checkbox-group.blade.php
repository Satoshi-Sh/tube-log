@props([
    'label',
    'name',
    'options' => [],
    'selected' => []
])

<x-forms.field :$label :$name>
    <div class="rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full space-y-2">
        @foreach ($options as $option)
            @php
                $value = $option['id'];
                $id = $name . '_' . $option['name'];
            @endphp
            <label for="{{ $id }}" class="flex items-center">
                <input
                    type="checkbox"
                    id="{{ $id }}"
                    name="{{ $name }}[]"
                    value="{{ $value }}"
                    @checked(in_array($option['name'], old($name, $selected)))
                    class="mr-2"
                >
                <span>{{ ucfirst($option['name']) }}</span>
            </label>
        @endforeach
    </div>
</x-forms.field>

