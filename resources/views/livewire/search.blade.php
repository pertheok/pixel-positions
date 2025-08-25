<div>
    <form>

        <div class="mt-2 mb-4 flex justify-between">
            <div class="flex-1">
                <x-forms.input name="searchText" label="" wire:model.live.debounce="searchText" placeholder="{{ $placeholder }}" />
            </div>
            <x-forms.button wire:click.prevent="clear()" class="ml-2 mt-2 mb-2 disabled:bg-blue-400" :disabled="empty($searchText)">Clear</x-forms.button>
        </div>

    </form>

    <livewire:search-results :results="$results" :show="!empty($searchText)" />
</div>


{{-- <input wire:model.live="name" /> updated with every keystroke --}} 
{{-- <input wire:model.live.debounce.1000="name" udpates after .VALUE had passed after the last keystroke /> --}}
{{-- <input wire:model.change="name" /> updated after field loses focus and has been updated --}} 
{{-- <input wire:model.blur="name" /> updated after field loses focus --}} 