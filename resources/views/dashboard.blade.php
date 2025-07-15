<x-layout.app>

    <x-container>
        @if ($message = session()->get('message'))
            <div>{{ $message }}</div>
            <br>
        @endif
        <div class="text-center space-y-2 mb-4">
            <x-img src="/storage/{{ $user->photo }}" alt="Profile Picture" />
            <div class="font-bold text-2xl tracking-wider">{{ $user->name }}</div>
            <div class="text-sm opacity-70">{{ $user->description }}</div>
            <div class="flex justify-between">
                <x-a href="{{ route('profile') }}" class="link-secondary">Atualizar Perfil</x-a>

                <x-a href="{{ route('links.create') }}" class="link-secondary">Criar</x-a>

            </div>
        </div>
        <ul class="space-y-2 w-125">
            @foreach ($links as $link)
                <li class="flex items-center gap-2">
                    @unless ($loop->last)
                        <x-form :route="route('links.down', $link)" patch class="w-13 flex-none">
                            <x-button class="btn-ghost">
                                <x-icons.arrow-down />
                            </x-button>
                        </x-form>
                    @else
                        <x-button disabled class="w-13">
                            <x-icons.arrow-down />
                        </x-button>
                    @endunless
                    @unless ($loop->first)
                        <x-form :route="route('links.up', $link)" patch class="w-13 flex-none">
                            <x-button class="btn-ghost">
                                <x-icons.arrow-up />
                            </x-button>
                        </x-form>
                    @else
                        <x-button disabled class="w-13">
                            <x-icons.arrow-up />
                        </x-button>
                    @endunless
                    <x-button href="{{ route('links.edit', $link) }}"
                        class="btn btn-info btn-block btn-outline flex-initial">
                        {{ $link->name }}
                    </x-button>
                    <x-form :route="route('links.destroy', $link)" delete onsubmit="return confirm('Are you sure?')" class="flex-initial">
                        <button class="w-25 link">
                            <x-icons.trash />
                        </button>
                    </x-form>
                </li>
            @endforeach
        </ul>

    </x-container>

</x-layout.app>
