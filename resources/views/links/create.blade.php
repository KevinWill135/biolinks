<x-layout.app>
    <div>

        <h1>Salvar Links</h1>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <br>

        @if ($message = session()->get('message'))
            <div>{{ $message }}</div>
            <br>
        @endif
        <form action="{{ route('links.create') }}" method="post">
            @csrf

            <div>
                <input type="text" name="link" placeholder="link" value="{{ old('link') }}">
                @error('link')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <input type="text" name="name" placeholder="name">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit">Salvar</button>
        </form>
    </div>
</x-layout.app>
