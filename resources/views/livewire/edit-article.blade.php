<div class="m-auto mb-4">
    <x-forms.form wire:submit="save">
        <h3 class="text-lg text-gray-200 mb-3">Edit Article (ID: {{ $form->id }})</h3>
        <div class="mb-3">
            <span wire:dirty wire:target="form.title" class="text-amber-600">Below field was changed.</span>
            <x-forms.input label="Title" name="title" wire:model="form.title" />
        </div>

        <div class="mb-3">
            <span wire:dirty wire:target="form.content" class="text-amber-600">Below field was changed.</span>
            <x-forms.field label="Content" name="content">
                <textarea id="content" class="p-2 w-full border rounded-xl bg-white/10 border-white/10 text-white" wire:model="form.content">

                </textarea>
            </x-forms.field>
        </div>

        <div class="mb-3">
            <div class="flex items-center">
                <x-forms.input type="file" label="Photo" name="photo" wire:model="form.photo" />

                <div class="w-1/2">
                    @if ($form->photo)
                        <img src="{{ Storage::url($form->photo->temporaryUrl()) }}">
                    @elseif ($form->photo_path)
                        <img src="{{ Storage::url($form->photo_path) }}">
                    @endif
                </div>
            </div>
        </div>

        <div class="mb-3 ">
            <span wire:dirty wire:target="form.published" class="text-amber-600">Below field was changed.</span>
            <x-forms.input type="checkbox" label="Published" name="published" wire:model.boolean="form.published" checked />
        </div>

        <div>
            <span class="font-bold" wire:dirty.class="text-amber-600" wire:target="form.notifications">Allow Notifications?<span wire:dirty wire:target="form.notifications">*</span></span>
            <div class="mb-2 flex items-center space-x-10">
                <x-forms.input class="space-x-2" type="radio" label="Yes" name="yes" value="true" wire:model.boolean="form.allowNotifications" />
                <x-forms.input class="space-x-2" type="radio" label="No" name="no" wire:click="form.notifications = []" value="false" wire:model.boolean="form.allowNotifications" />
            </div>
        </div>
       

        <div class="mb-2 flex items-center space-x-10" x-show="$wire.form.allowNotifications">
            <x-forms.input type="checkbox" label="Email" name="email" value="email" wire:model="form.notifications" />
            <x-forms.input type="checkbox" label="SMS" name="sms" value="sms" wire:model="form.notifications" />
            <x-forms.input type="checkbox" label="Push" name="push" value="push" wire:model="form.notifications" />
        </div>

        <div class="mb-3">
            <x-forms.button 
                {{-- wire:dirty.remove.attr="disabled" // removed in later exercise
                wire:dirty.class="hover:bg-indigo-900" 
                disabled  --}}
                class="text-gray-200 p-2 rounded-sm disabled:opacity-75 disabled:bg-blue-300" 
                type="submit"
            >
                Save
            </x-forms.button>
        </div>
    </x-forms.form>
</div>