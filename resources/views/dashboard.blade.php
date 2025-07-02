<div>
    @if ($message = session()->get('message'))
        <div>{{ $message }}</div>
        <br>
    @endif

    <h1>Dashboard</h1>

    <a href="{{ route('links.create') }}">Criar</a>
    <br>

    <ul>
        @foreach ($links as $link)
            <li style="display: flex">
                @unless ($loop->last)
                    <form action="{{ route('links.down', $link) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <button>⬇️</button>
                    </form>
                @endunless
                @unless ($loop->first)
                    <form action="{{ route('links.up', $link) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <button>⬆️</button>
                    </form>
                @endunless
                <a href="{{ route('links.edit', $link) }}"> {{ $link->name }}: {{ $link->id }} </a>
                <form action="{{ route('links.destroy', $link) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button>🗑️</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
