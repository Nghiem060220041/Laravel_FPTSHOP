@props([
    'size' => 'md' // sm, md, lg
])

@php
    $sizeClass = [
        'sm' => 'w-12 h-12',
        'md' => 'w-12 h-12',
        'lg' => 'w-12 h-12'
    ][$size] ?? 'w-12 h-12';
@endphp

<div class="flex flex-col items-center justify-center">
    <div class="bg-gray-800 rounded-full {{ $sizeClass }} flex items-center justify-center">
        <svg class="w-2/3 h-2/3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
    </div>
    
    @if($slot->isNotEmpty())
        <div class="mt-4 text-center">
            {{ $slot }}
        </div>
    @endif
</div>