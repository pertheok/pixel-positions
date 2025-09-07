<div>
    <form>

        <div class="mt-2 mb-4 flex justify-between">
            <div class="flex-1">
                <x-forms.input 
                    name="searchText" 
                    label="" 
                    wire:model.live.debounce="searchText" 
                    placeholder="{{ $placeholder }}" 
                    wire:offline.attr="disabled"
                    {{-- wire:offline.attr.remove="disabled" --}}
                />
            </div>
        </div>

    </form>
    @if (!empty($searchText))
        <div
            wire:transition.duration.1000ms 
            {{-- wire:transition.in animation when the results are in, but not on out --}}
            {{-- wire:transition.out opposite of the above --}}
            {{-- wire:transition.opacity for just the opacity effect --}}
            {{-- wire:transition.scale.origin.top.left for just the scale effect, directions optional --}}
            x-data
            @click.away="$dispatch('search:clear-results')"
        >
            <livewire:search-results 
                :results="$results" 
                {{-- :show="!empty($searchText)"  --}}
            />
        </div>
    {{-- @else
        <div wire:transition>
            <livewire:search-results 
                :results="$results" 
                :show="!empty($searchText)"
            />
        </div> --}}
    @endif
</div>


{{-- <input wire:model.live="name" /> updated with every keystroke --}} 
{{-- <input wire:model.live.debounce.1000="name" udpates after .VALUE had passed after the last keystroke /> --}}
{{-- <input wire:model.change="name" /> updated after field loses focus and has been updated --}} 
{{-- <input wire:model.blur="name" /> updated after field loses focus --}} 