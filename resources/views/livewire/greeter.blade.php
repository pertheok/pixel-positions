<div>
    <div>
        Hello, {{ $name }}!
    </div>

    <form wire:submit="changeName(document.querySelector('#newName').value)">
        <div class="mt-2">
            <x-forms.input id="newName" name="newName" label="New Name" />
        </div>

        <div class="mt-2">
            <x-forms.button type="submit">Greet</x-forms.button>
        </div>
    </form>
</div>
