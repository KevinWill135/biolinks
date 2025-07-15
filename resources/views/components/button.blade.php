@props(['href' => null])

@php
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }} {{ $href ? "href=$href" : '' }} {{ $attributes->class(['btn btn-primary']) }}>
    {{ $slot }}
    </{{ $tag }}>
