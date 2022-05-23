<button
    {{ $attributes->merge(['type' => 'submit','class' => 'btn btn-green text-uppercase','style' => 'background-color:#008989 ;color:#f2f9f9']) }}>
    {{ $slot }}
</button>
