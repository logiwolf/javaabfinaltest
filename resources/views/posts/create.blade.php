<x-layout>
  <div class="max-w-4xl mx-auto bg-white shadow p-6 rounded-lg mt-10">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-800">New Post</h1>
    </div>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf

      <!-- Title  -->
      <div>
        <x-form.label for="title">Title</x-form.label>
        <x-form.input id="title" name="title" placeholder="Enter title" required />
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
          placeholder="Start writing..."
          required
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-orange-500">{{ old('body') }}</textarea>
        @error('body')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Image  -->
      <div>
        <x-form.label for="image">Image</x-form.label>
        <input
          type="file" name="image" accept="image/*"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-orange-500 block" />
        @error('image')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Feature Post  -->
      <div class="mt-4">
        <label class="inline-flex items-center">
          <input type="checkbox" name="featured" value="1" class="form-checkbox">
          <span class="ml-2 text-gray-700">Feature this post</span>
        </label>
      </div>

      <!-- Tags  -->
      <div class="mt-6">
        <label for="tags-input" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
        <input
          id="tags-input"
          name="tags"
          type="text"
          placeholder="#tags"
          autocomplete="off"
          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-orange-500"
          value="{{ old('tags') }}" />
        @error('tags')
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Buttons -->
      <div class="flex justify-end gap-3 mt-8">
        <a href="{{ route('posts.index') }}"
          class="px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-100 transition">
          Cancel
        </a>

        <x-form.button>Create</x-form.button>
      </div>
    </form>
  </div>
</x-layout>