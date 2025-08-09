<div class="flex justify-center">
    <button {{ $attributes->merge(['class' => 'cursor-pointer bg-blue-800 hover:bg-blue-900 transition-colors duration-300 rounded py-2 px-6 font-bold']) }}>
        {{ $slot }}
    </button>
</div>
