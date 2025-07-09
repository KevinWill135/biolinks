<div>

    <img src="/storage/{{ $user->photo }}" alt="{{ $user->name }} Picture">
    <h1>BioLinks</h1>
    <br>

    <h3>{{ $user->description }}</h3>
    <ul>
        @foreach ($user->links as $link)
            <li style="display: flex">
                <a href="{{ $link->$link }}" target="_blank"> {{ $link->name }}: {{ $link->id }} </a>
            </li>
        @endforeach
    </ul>
</div>
