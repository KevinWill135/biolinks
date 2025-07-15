@props(['href'])
<a href="{{ $href }}" {{ $attributes->class(['link link-hover']) }}>{{ $slot }}</a>
