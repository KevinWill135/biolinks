<x-layout.app>
    <div>

        @if ($message = session('message'))
            <div>{{ $message }}</div>
        @endif

        <h1>Profile</h1>

        <form action="{{ route('profile') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <img src="/storage/{{ $user->photo }}" alt="Profile Picture">
                <input type="file" name="photo">
            </div>

            <div>
                <input type="text" name="name" placeholder="Nome" value="{{ old('name', $user->name) }}">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div>
                <textarea name="description" placeholder="Resumo">{{ old('description', $user->description) }}</textarea>
                @error('description')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <br>

            <div>
                <span>biolinks.com.br/</span>
                <input name="handler" placeholder="@seulink" value="{{ old('handler', $user->handler) }}">
                @error('handler')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <br>

            <a href="{{ route('dashboard') }}">Cancelar</a>
            <button type="submit">Atualizar</button>
        </form>
    </div>
</x-layout.app>
