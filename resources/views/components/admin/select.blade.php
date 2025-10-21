@props([
    'name',
    'id' => null,
    'label' => null,
    'options' => [],
    'selected' => null,
    'required' => false,
    'disabled' => false,
    'placeholder' => 'Select an option',
    'error' => null,
    'helper' => null,
])

@php
    $inputId = $id ?? $name;
@endphp

<div {{ $attributes->merge(['class' => 'mb-4']) }}>
    @if ($label)
        <label for="{{ $inputId }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if ($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif
    
    <select
        name="{{ $name }}"
        id="{{ $inputId }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm {{ $error ? 'border-red-300' : '' }}"
        {{ $attributes->except(['class']) }}
    >
        @if ($placeholder)
            <option value="" @if(!$selected) selected @endif disabled>{{ $placeholder }}</option>
        @endif
        
        @foreach ($options as $value => $label)
            <option value="{{ $value }}" @if($selected == $value) selected @endif>{{ $label }}</option>
        @endforeach
    </select>
    
    @if ($helper)
        <p class="mt-1 text-sm text-gray-500">{{ $helper }}</p>
    @endif
    
    @if ($error)
        <p class="mt-1 text-sm text-red-600">{{ $error }}</p>
    @endif
</div>