<div>

    <h1>Editar Link {{ $link->id }}</h1>

    @if ($message = session()->get('message'))
        <div>{{ $message }}</div>
        <br>
    @endif
    <form action="{{ route('links.edit', $link) }}" method="post">
        @csrf
        @method('put')

        <div>
            <input name="link" placeholder="link" value="{{ old('link', $link->link) }}">
            @error('link')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <input name="name" placeholder="name" value="{{ old('name', $link->name) }}">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit">Salvar</button>
    </form>
</div>
