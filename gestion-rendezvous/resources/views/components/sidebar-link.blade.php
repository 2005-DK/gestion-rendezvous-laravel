@props(['route' => null, 'url' => null, 'label'])

<a href="{{ $route ? route($route) : url($url) }}"
   class="block py-3 px-6 text-gray-700 hover:bg-blue-100 rounded transition">
    {{ $label }}
</a>
