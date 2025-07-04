@props(['post', 'id' => null])

<div {{ $id ? "id={$id}" : '' }}
  class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row w-full mb-8 md:h-80 h-auto">

  <!-- Image Section  -->
  <div class="w-full md:w-1/2 h-48 md:h-full">
    @if ($post->image_path)
    <img src="{{ asset('storage/' . $post->image_path) }}"
      alt="{{ $post->title }}"
      class="w-full h-full object-cover">
    @else
    <img src="https://source.unsplash.com/800x600/?nature"
      alt="Default Image"
      class="w-full h-full object-cover">
    @endif
  </div>

  <!-- Content Section -->
  <div class="p-8 flex flex-col justify-between flex-1 space-y-4 md:h-full h-auto">
    {{-- Title & Edit --}}
    <div class="flex justify-between items-start">
      <h2 class="text-2xl font-semibold text-gray-800 leading-tight line-clamp-2">
        {{ $post->title }}
      </h2>

      @auth
      @if (auth()->id() === $post->user_id)
      <a href="{{ route('posts.edit', $post) }}"
        class="text-gray-400 hover:text-blue-600"
        title="Edit Post">
        <x-heroicon-o-pencil class="w-5 h-5" />
      </a>
      @endif
      @endauth
    </div>

    <!-- Excerpt (hidden on small screens)  -->
    <p class="hidden md:block text-gray-700 text-sm md:text-base line-clamp-5 flex-1">
      {{ Str::limit($post->body, 200) }}
    </p>
    <x-uploaded-time :date="$post->created_at" />
    <!-- Read More Button with extra bottom padding -->
    <div class="mt-2">
      <x-button href="{{ route('posts.show', $post) }}" readMore class="mb-6">
        Read More
      </x-button>
    </div>
  </div>
</div>