<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-primary bg-indigo-500 hover:bg-indigo-600 active:bg-indigo-700 w-full']) }}>
    {{ $slot }}
</button>
