<div>
    <h1>Login</h1>

    <form action="/login" method="post">
        @csrf

        <input type="email" name="email" placeholder="email" value="{{ old('email') }}">
        <input type="password" name="password" placeholder="password">
        <button type="submit">Enviar</button>
    </form>
</div>
