@props(['title', 'actions'])

<div class="card bg-slate-800 w-2/3 shadow-xl">
    <div class="card-body">
        <div class="card-title">{{ $title }}</div>
        @if ($message = session()->get('message'))
            <div class="text-md text-primary">{{ $message }}</div>
            <br>
        @endif
        {{ $slot }}
        <div class="card-actions flex items-center justify-between">
            {{ $actions }}
        </div>

    </div>
</div>
