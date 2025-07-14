@props(['name', 'prefix' => null])

<label class="input input-bordered bg-slate-900 w-full">
    @if ($prefix)
        <span>
            {{ $prefix }}
        </span>
    @endif
    <input class="grow" name="{{ $name }}" {{ $attributes }}>
    @error($name)
        <div class="text-sm text-error">{{ $message }}</div>
    @enderror
</label>
