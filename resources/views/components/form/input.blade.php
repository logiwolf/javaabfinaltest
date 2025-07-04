@props([
'id',
'type' => 'text',
'name',
'value' => '',
'placeholder' => '',
'required' => false,
'disabled' => false,
])

<input
  id="{{ $id }}"
  name="{{ $name }}"
  type="{{ $type }}"
  value="{{ old($name, $value) }}"
  placeholder="{{ $placeholder }}"
  {{ $required ? 'required' : '' }}
  {{ $disabled ? 'disabled' : '' }}
  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-orange-500 {{ $disabled ? 'bg-gray-10 cursor-not-allowed opacity-60' : '' }}" />