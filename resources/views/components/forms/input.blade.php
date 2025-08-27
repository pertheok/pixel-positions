@props(['label', 'name', 'type' => 'text'])

@php
    $defaults = [
        'type' => $type,
        'id' => $name,
        'name' => $name,
        'value' => old($name)
    ];

    if ($type === 'checkbox' || $type === 'radio') {
        $defaults['class'] = '';
    } else {
        $defaults['class'] = 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full';
    }
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>