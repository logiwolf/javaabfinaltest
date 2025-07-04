@props(['for'])

<label for="{{ $for }}" class="block font-semibold text-gray-700 mb-1">
  {{ $slot }}
</label>