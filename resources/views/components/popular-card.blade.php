@props(['post'])

<a href="{{ route('posts.show', $post) }}"
    class="block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-200 group">

    {{-- Image --}}
    @if ($post->image_path)
    <img src="{{ asset('storage/' . $post->image_path) }}"
        alt="{{ $post->title }}"
        class="w-full h-32 object-cover group-hover:opacity-90 transition" />
    @else
    <img src="https://source.unsplash.com/400x200/?nature"
        alt="Default image"
        class="w-full h-32 object-cover group-hover:opacity-90 transition" />
    @endif

    {{-- Title --}}
    <div class="p-3">
        <h3 class="text-sm font-semibold text-gray-800 leading-tight line-clamp-2">
            {{ $post->title }}
        </h3>
        <x-uploaded-time :date="$post->created_at" />
    </div>

</a>