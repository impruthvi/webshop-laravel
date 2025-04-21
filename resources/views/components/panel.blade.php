@props(['title' => ''])
<div {{ $attributes->merge(['class' => 'bg-white shadow rounded-lg p-4']) }}>
    @if ($title)
        <h2 class="text-lg font-semibold mb-4">{{ $title }}</h2>
    @endif
    {{ $slot }}
</div>


