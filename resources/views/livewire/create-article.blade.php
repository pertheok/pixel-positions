<div class="m-auto mb-4">
    <x-forms.form wire:submit="save">
        <h3 class="text-lg text-gray-200 mb-3">Create Article</h3>
        <div class="mb-3">
            <x-forms.input label="Title" name="title" wire:model="form.title" />
        </div>

        <div class="mb-3">
            <x-forms.field label="Content" name="content">
                <textarea id="content" class="p-2 w-full border rounded-xl bg-white/10 border-white/10 text-white" wire:model="form.content">

                </textarea>
            </x-forms.field>
        </div>

        <div>
            <span class="font-bold">Allow Notifications:</span>
            <div class="mb-2 flex items-center space-x-10">
                <x-forms.input class="space-x-2" type="radio" label="Yes" name="yes" value="true" wire:model.boolean="form.allowNotifications" />
                <x-forms.input class="space-x-2" type="radio" label="No" name="no" value="false" wire:model.boolean="form.allowNotifications" />
            </div>
        </div>
       

        <div class="mb-2 flex items-center space-x-10" x-show="$wire.form.allowNotifications">
            <x-forms.input type="checkbox" label="Email" name="email" value="email" wire:model="form.notifications" />
            <x-forms.input type="checkbox" label="SMS" name="sms" value="sms" wire:model="form.notifications" />
            <x-forms.input type="checkbox" label="Push" name="push" value="push" wire:model="form.notifications" />
        </div>

        <div class="mb-3">
            <x-forms.button wire:dirty.remove.attr="disabled" wire:dirty.class="hover:bg-indigo-900" disabled class="text-gray-200 p-2 rounded-sm disabled:opacity-75 disabled:bg-blue-300" type="submit">Save</x-forms.button>
        </div>
    </x-forms.form>
</div>
