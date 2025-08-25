<div>
    <form>

        <div class="mt-2 mb-4 flex justify-between">
            <div class="flex-1">
                <x-forms.input name="searchText" label="" wire:model.live.debounce="searchText" placeholder="{{ $placeholder }}" />
            </div>
        </div>

    </form>

    <livewire:search-results :results="$results" :show="!empty($searchText)" />
</div>


{{-- <input wire:model.live="name" /> updated with every keystroke --}} 
{{-- <input wire:model.live.debounce.1000="name" udpates after .VALUE had passed after the last keystroke /> --}}
{{-- <input wire:model.change="name" /> updated after field loses focus and has been updated --}} 
{{-- <input wire:model.blur="name" /> updated after field loses focus --}} 