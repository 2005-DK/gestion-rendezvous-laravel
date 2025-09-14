@props(['url', 'label'])

<a href="{{ $url }}"
   class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 transition">
    {{ $label }}
</a>
