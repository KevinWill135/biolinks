<div>
    <textarea {{ $attributes->class(['textarea textarea-bordered bg-slate-900 w-full']) }}>{{ $slot }}</textarea>
    @error('description')
        <div>{{ $message }}</div>
    @enderror
</div>
