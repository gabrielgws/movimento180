<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Retiro 2025') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-2 lg:px-8">
        @livewire('search-users')
    </div>
</x-app-layout>
