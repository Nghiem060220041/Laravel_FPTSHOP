@props([
    'type' => 'button',
    'color' => 'primary', // primary, success, danger, warning, info, secondary
    'size' => 'md', // sm, md, lg
    'href' => null,
    'fullWidth' => false,
    'disabled' => false,
    'icon' => null,
])

@php
    $baseClasses = 'inline-flex items-center justify-center rounded font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2';
    
    $sizeClasses = [
        'sm' => 'px-2.5 py-1.5 text-xs',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-6 py-3 text-base',
    ][$size] ?? 'px-4 py-2 text-sm';
    
    $colorClasses = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white focus:ring-blue-500',
        'success' => 'bg-green-600 hover:bg-green-700 text-white focus:ring-green-500',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white focus:ring-red-500',
        'warning' => 'bg-yellow-500 hover:bg-yellow-600 text-white focus:ring-yellow-500',
        'info' => 'bg-indigo-600 hover:bg-indigo-700 text-white focus:ring-indigo-500',
        'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-800 focus:ring-gray-400',
    ][$color] ?? 'bg-blue-600 hover:bg-blue-700 text-white focus:ring-blue-500';
    
    $widthClasses = $fullWidth ? 'w-full' : '';
    $disabledClasses = $disabled ? 'opacity-50 cursor-not-allowed' : '';
    
    $classes = "{$baseClasses} {$sizeClasses} {$colorClasses} {$widthClasses} {$disabledClasses} " . ($attributes->get('class') ?? '');
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        @if ($icon)
            <span class="mr-2">{{ $icon }}</span>
        @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }} @if($disabled) disabled @endif>
        @if ($icon)
            <span class="mr-2">{{ $icon }}</span>
        @endif
        {{ $slot }}
    </button>
@endif