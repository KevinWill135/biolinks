<x-layout.app>
    <div>
        <h1>Login</h1>

        @if ($message = session()->get('message'))
            <div>{{ $message }}</div>
            <br>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf

            <div>
                <input type="text" name="email" placeholder="email" value="{{ old('email') }}">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <input type="password" name="password" placeholder="password">
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </div>
</x-layout.app>
