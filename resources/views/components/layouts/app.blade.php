<x-layout>
    @auth
        <div class="">
            <livewire:search placeholder="Type something to search..." />
        </div>
    @endauth
    {{ $slot }}
</x-layout>