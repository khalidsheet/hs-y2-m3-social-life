<div {{ $attributes->merge(['class' => "text-$variant-500 rounded-lg py-2 flex items-center gap-x-2 $background"]) }}>
    @if ($hasDot)
        <span class="w-2 h-2 bg-{{ $variant }}-500 rounded-full inline-block"></span>
    @endif
    {{ $slot }}
</div>
