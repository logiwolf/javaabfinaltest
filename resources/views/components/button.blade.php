@props([
'href' => null,
'type' => 'submit',
'readMore' => false, // new prop to toggle "Read More" style
])

@php
// Base classes for normal button or link
$baseClasses = 'inline-flex items-center justify-center px-5 py-2 text-white font-semibold rounded-lg shadow-md transition
bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2';

// Classes for "Read More" style link
$readMoreClasses = 'inline-flex items-center px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white text-sm font-medium rounded-lg shadow-md transition
focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 w-fit';
@endphp

@if ($href)
<a href="{{ $href }}"
  {{ $attributes->merge(['class' => $readMore ? $readMoreClasses : $baseClasses]) }}>
  {{ $slot }}

  {{-- Add arrow icon if readMore is true --}}
  @if ($readMore)
  <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
  </svg>
  @endif
</a>
@else
<button type="{{ $type }}"
  {{ $attributes->merge(['class' => $baseClasses]) }}>
  {{ $slot }}
</button>
@endif