@props(['post'])

<div class="mb-10 bg-white rounded-lg shadow-lg overflow-hidden">
  {{-- Image Banner --}}
  @if($post->image_path)
  <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
  @else
  <img src="https://source.unsplash.com/1200x600/?nature,landscape" alt="Featured Image" class="w-full h-96 object-cover">
  @endif

  <div class="p-8 space-y-4">
    <div class="flex justify-between items-start">
      {{-- Section Title --}}


      {{-- Edit Icon under image, top right of content --}}
      @auth
      @if(auth()->id() === $post->user_id)

      <a href="{{ route('posts.featured.edit') }}">
        <x-heroicon-o-pencil class="w-6 h-6" />
      </a>
      </a>
      @endif
      @endauth
    </div>



    {{-- Post Title --}}
    <div>
      <h3 class="text-4xl font-extrabold text-gray-900 leading-tight">{{ $post->title }}</h3>
      <x-uploaded-time :date="$post->created_at" />

    </div>




    {{-- Read More Button --}}
    <x-button href="{{ route('posts.show', $post) }}" class="mt-4 px-6 py-3 text-base">
      Continue Reading
    </x-button>
  </div>
</div>