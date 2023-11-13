<button
    {{ $attributes->merge([
        'class' => "bg-$variant-500 hover:bg-$variant-600 active:bg-$variant-700 w-full h-[48px] rounded-lg text-white uppercase font-bold text-lg",
    ]) }}>
    {{ $slot }}
</button>
