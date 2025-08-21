<div>
    <form wire:submit="changeName()">
        <div class="mt-2">
            <x-forms.select name="greeting" label="Greeting" wire:model.fill="greeting" class="mb-4">
                <option value="Hello" class="text-black">Hello</option>
                <option value="Hi" class="text-black">Hi</option>
                <option value="Hey" class="text-black">Hey</option>
                <option value="Howdy" class="text-black" selected>Howdy</option>
            </x-forms.select>
            <x-forms.input name="name" label="New Name" wire:model="name" />
        </div>

        <div class="mt-4">
            <x-forms.button type="submit">Greet</x-forms.button>
        </div>
    </form>

    @if ($name != '')
        <div class="text-4xl mt-4">
            {{ $greeting }}, {{ $name }}!
        </div>
    @endif
</div>
