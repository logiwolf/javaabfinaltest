@props(['post'])

<div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col w-full mb-6">

  <!-- Post Image  -->
  @if ($post->image_path)
  <img src="{{ asset('storage/' . $post->image_path) }}"
    alt="Post Image"
    class="w-full h-48 object-cover" />
  @else
  <img src="https://source.unsplash.com/600x400/?nature,water"
    alt="Default Image"
    class="w-full h-48 object-cover" />
  @endif

  <!-- Content Area  -->
  <div class="p-4 space-y-3 flex flex-col flex-grow justify-between">

    {{-- Post Title + Tools --}}
    <div class="flex justify-between items-start">
      <h2 class="text-lg font-semibold text-gray-800 leading-tight line-clamp-2">
        {{ $post->title }}
      </h2>

      @if(auth()->check() && auth()->id() === $post->user_id)
      <div class="flex items-center gap-2 text-gray-500 text-xl">
        <a href="{{ route('posts.edit', $post) }}" title="Edit" class="hover:text-blue-600">
          <x-heroicon-o-pencil class="w-5 h-5 text-blue-600" />
        </a>
        <x-message-box :post="$post" />
      </div>
      @endif
    </div>
    <x-uploaded-time :date="$post->created_at" />
    {{-- Read More Button --}}
    <x-button href="{{ route('posts.show', $post) }}" readMore class="px-3 py-1.5 text-sm">
      Read More
    </x-button>

  </div>
</div>