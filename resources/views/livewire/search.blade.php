<div>
    <form>

        <div class="mt-2">
            <x-forms.input name="searchText" label="Search" wire:model.live.debounce="searchText" placeholder="Type something to search..." />
        </div>
    </form>

    <div class="mt-4">
        @foreach ($results as $result)
            <div class="pt-2">{{ $result->title }}</div>              
        @endforeach
    </div>
</div>


{{-- <input wire:model.live="name" /> updated with every keystroke --}} 
{{-- <input wire:model.live.debounce.1000="name" udpates after .VALUE had passed after the last keystroke /> --}}
{{-- <input wire:model.change="name" /> updated after field loses focus and has been updated --}} 
{{-- <input wire:model.blur="name" /> updated after field loses focus --}} 