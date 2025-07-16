<x-layout.app>

    <x-container>
        <div class="text-center space-y-2 mb-4">
            <x-img src="/storage/{{ $user->photo }}" alt="Profile Picture" />
            <div class="font-bold text-2xl tracking-wider">{{ $user->name }}</div>
            <div class="text-sm opacity-70">{{ $user->description }}</div>
        </div>
        <ul class="space-y-2 w-125">
            @foreach ($user->links as $link)
                <li class="flex items-center gap-2">
                    <x-button href="{{ $link->$link }}" class="btn btn-info btn-block btn-outline flex-initial"
                        target="_blank">
                        {{ $link->name }}
                    </x-button>
                </li>
            @endforeach
        </ul>

    </x-container>

</x-layout.app>
