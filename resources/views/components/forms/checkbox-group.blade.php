@props([
    'label',
    'name',
    'options' => [], // e.g. ['PHP', 'JavaScript', 'Python']
    'selected' => []
])

<x-forms.field :$label :$name>
    <div class="rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full space-y-2">
        @foreach ($options as $option)
            @php
                $value = $option; // or Str::slug($option) if you want lowercase
                $id = $name . '_' . $option;
            @endphp
            <label for="{{ $id }}" class="flex items-center">
                <input
                    type="checkbox"
                    id="{{ $id }}"
                    name="{{ $name }}[]"
                    value="{{ $value }}"
                    @checked(in_array($value, old($name, $selected)))
                    class="mr-2"
                >
                <span>{{ ucfirst($option) }}</span>
            </label>
        @endforeach
    </div>
</x-forms.field>

