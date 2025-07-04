@props(['post', 'asButton' => false])

<div x-data="{ open: false }" class="inline">
  <!-- Trigger Button -->
  <button
    @click="open = true"
    type="button"
    @class([ 'bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition'=> $asButton,
    'text-red-600 hover:text-red-800 focus:outline-none' => !$asButton,
    'flex items-center gap-2' => true,
    ])
    >
    @if ($asButton)
    Delete
    @else
    <x-heroicon-o-trash class="w-5 h-5" />
    @endif
  </button>

  <!-- this is my Confirmation Modal -->
  <div
    x-show="open"
    style="display: none;"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    @keydown.escape.window="open = false"
    x-transition>
    <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
      <h2 class="text-lg font-semibold mb-4">Confirm Delete</h2>
      <p>Are you sure you want to delete this post?</p>
      <div class="mt-6 flex justify-end gap-4">
        <button @click="open = false" class="px-4 py-2 border rounded hover:bg-gray-100">
          Cancel
        </button>
        <form method="POST" action="{{ route('posts.destroy', $post) }}">
          @csrf
          @method('DELETE')
          <button
            type="submit"
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
            Delete
          </button>
        </form>
      </div>
    </div>
  </div>
</div>