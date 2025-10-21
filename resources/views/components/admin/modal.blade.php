@props([
    'id' => null,
    'title' => null,
    'show' => false,
    'maxWidth' => '2xl',
    'closeable' => true,
])

@php
    $maxWidthClasses = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth] ?? 'sm:max-w-2xl';
@endphp

<div
    x-data="{ show: {{ $show ? 'true' : 'false' }} }"
    x-show="show"
    x-on:keydown.escape.window="show = false"
    x-on:close.stop="show = false"
    x-on:open-modal.window="$event.detail === '{{ $id }}' ? show = true : null"
    x-id="['modal-title', 'modal-description']"
    class="fixed inset-0 z-50 overflow-y-auto"
    aria-labelledby="modal-title"
    role="dialog"
    aria-modal="true"
    x-cloak
>
    <div class="flex min-h-screen items-center justify-center px-4 text-center sm:block sm:p-0">
        <div
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
            x-on:click="show = false"
            aria-hidden="true"
        ></div>

        <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
        
        <div
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block transform overflow-hidden rounded-lg bg-white text-left align-bottom shadow-xl transition-all sm:my-8 sm:w-full {{ $maxWidthClasses }} sm:align-middle"
            x-on:click.stop
        >
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                @if ($title)
                    <div class="mb-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" :id="$id('modal-title')">
                            {{ $title }}
                        </h3>
                    </div>
                @endif
                
                <div :id="$id('modal-description')">
                    {{ $slot }}
                </div>
            </div>

            @if (isset($footer))
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    {{ $footer }}
                </div>
            @endif
            
            @if ($closeable)
                <button
                    type="button"
                    class="absolute top-3 right-3 text-gray-400 hover:text-gray-500"
                    x-on:click="show = false"
                >
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            @endif
        </div>
    </div>
</div>