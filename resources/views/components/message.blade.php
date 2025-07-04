@props(['type' => 'error', 'message'])

@php
$colors = [
'error' => 'text-red-600 bg-red-100 border border-red-300',
'success' => 'text-green-600 bg-green-100 border border-green-300',
];
@endphp

<div class="p-3 rounded mb-4 {{ $colors[$type] ?? $colors['error'] }}">
  {{ $message }}
</div>