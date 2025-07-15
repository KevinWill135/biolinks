<x-layout.app>

    <x-container>
        <x-card title="Profile">
            <x-form :route="route('profile')" put id="profile-form" enctype="multipart/form-data">
                <div class="flex flex-col items-center justify-center gap-3">
                    <x-img src="/storage/{{ $user->photo }}" alt="Profile Picture" />
                    <x-file-input name="photo" class="self-start" />
                    <!--<input type="file" name="photo">-->
                </div>

                <x-input name="name" placeholder="Name" value="{{ old('name', $user->name) }}" />
                <x-textarea name="description">{{ old('description', $user->description) }}</x-textarea>

                <x-input name="handler" prefix="biolinks.com.br/" value="{{ old('handler', $user->handler) }}" />

            </x-form>
            <x-slot:actions>
                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button type="submit" form="profile-form">Edit</x-button>
            </x-slot:actions>
        </x-card>
    </x-container>

</x-layout.app>
