<x-layout>
  <div class="max-w-4xl mx-auto bg-white shadow p-6 rounded-lg mt-10">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">Edit Post: {{ $post->title }}</h1>
    </div>


    <p class="text-sm text-red-600 font-bold mb-4">
      DEBUG: Currently Editing Post ID: {{ $post->id }} |
      Title: {{ $post->title }} |
      Featured: {{ $post->featured ? 'Yes' : 'No' }}
    </p>
    <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Title  -->
      <div>
        <x-form.label for="title">Title</x-form.label>
        <x-form.input id="title" name="title" value="{{ $post->title }}" required />
        @error('title')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Body  -->
      <div>
        <x-form.label for="body">Body</x-form.label>
        <textarea
          id="body"
          name="body"
          rows="6"
          required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-orange-500">{{ old('body', $post->body) }}</textarea>
        @error('body')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Image -->
      <div>
        <x-form.label for="image">Change Image (optional)</x-form.label>
        <input
          id="image"
          name="image"
          type="file"
          accept="image/*"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-orange-500" />
        @error('image')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror

        @if ($post->image_path)
        <div class="mt-2">
          <p class="text-sm text-gray-600">Current Image:</p>
          <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post Image" class="mt-1 rounded shadow-md w-40">
        </div>
        @endif
      </div>


      <!-- Tag  -->
      <div class="mt-6">
        <label for=" tags-input" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
        @php
        $tagData = old('tags')
        ? old('tags')
        : $post->tags->pluck('name')->map(fn($name) => ['value' => $name])->toJson();
        @endphp

        <input
          id="tags-input"
          name="tags"
          type="text"
          placeholder="#tags"
          autocomplete="off"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-orange-500"
          value='{{ $tagData }}' />
        @error('tags')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror

        <!-- Buttons  -->
        <div class="flex justify-end gap-3 mt-8">
          <a href="{{ route('posts.index') }}"
            class="px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-100 transition">
            Cancel
          </a>

          <x-form.button>Update</x-form.button>
        </div>
    </form>
  </div>
</x-layout>