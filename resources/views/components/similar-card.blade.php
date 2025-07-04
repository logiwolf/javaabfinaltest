@props(['post'])

<a href="{{ route('posts.show', $post) }}" class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">

  {{-- Image --}}
  @if ($post->image_path)
  <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-40 object-cover" />
  @else
  <img src="https://source.unsplash.com/400x200/?nature,water" alt="Default Image" class="w-full h-40 object-cover" />
  @endif

  {{-- Title --}}
  <div class="p-4">
    <h3 class="text-lg font-semibold text-gray-800 line-clamp-2">
      {{ $post->title }}
    </h3>
  </div>

</a>