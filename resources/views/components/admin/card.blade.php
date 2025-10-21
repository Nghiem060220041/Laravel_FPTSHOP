@props([
    'title' => null,
    'footer' => null,
    'noPadding' => false,
])

<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow-md overflow-hidden']) }}>
    @if ($title)
        <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
            <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>
        </div>
    @endif
    
    <div class="{{ $noPadding ? '' : 'p-4' }}">
        {{ $slot }}
    </div>
    
    @if ($footer)
        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200">
            {{ $footer }}
        </div>
    @endif
</div>