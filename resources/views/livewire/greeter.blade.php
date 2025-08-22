<div>
    <form wire:submit="changeGreeting()">

        <div class="mt-2">
            <x-forms.select name="greeting" label="Greeting" wire:model.fill="greeting" class="mb-4">
                @foreach ($greetings as $greeting)
                    <option class="text-black" value="{{ $greeting->greeting }}">{{ $greeting->greeting }}</option>                    
                @endforeach
            </x-forms.select>
            <x-forms.input name="name" label="New Name" wire:model="name" />
        </div>

        <div class="mt-4">
            <x-forms.button type="submit">Greet</x-forms.button>
        </div>
    </form>

    @if ($greetingMessage != '')
        <div class="text-4xl mt-4">
            {{ $greetingMessage }}
        </div>
    @endif
</div>


{{-- <input wire:model.live="name" /> updated with every keystroke --}} 
{{-- <input wire:model.debounce.1000="name" udpates after .VALUE had passed after the last keystroke /> --}}
{{-- <input wire:model.change="name" /> updated after field loses focus and has been updated --}} 
{{-- <input wire:model.blur="name" /> updated after field loses focus --}} 