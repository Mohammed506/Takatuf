@props(['active', 'special' => ''])

@php
$styles = $active ?? false ? ';color:#04afaf;' : 'color:#008989;';
$classes = $active ?? false ? 'nav-link active font-weight-bolder' : 'nav-link';
@endphp

<li class="nav-link" style="
">


    <a {{ $attributes->merge(['class' => $classes, 'style' => $styles . $special]) }}>
        {{ $slot }}
    </a>
</li>
