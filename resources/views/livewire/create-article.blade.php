<div class="m-auto mb-4">
    <x-forms.form wire:submit="save">
        <h3 class="text-lg text-gray-200 mb-3">Create Article</h3>
        <div class="mb-3">
            <x-forms.input label="Title" name="title" wire:model="title" />
        </div>

        <div class="mb-3">
            <x-forms.field label="Content" name="content">
                <textarea id="content" class="p-2 w-full border rounded-xl bg-white/10 border-white/10 text-white" wire:model="content">

                </textarea>
            </x-forms.field>
        </div>
        <div class="mb-3">
            <x-forms.button class="text-gray-200 p-2 hover:bg-indigo-900 rounded-sm" type="submit">Save</x-forms.button>
        </div>
    </x-forms.form>
</div>
