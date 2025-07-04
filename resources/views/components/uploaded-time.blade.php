@props(['date'])

<span class="text-xs text-gray-500">
  {{ $date->diffForHumans() }}
</span>