<x-layout>
  <x-blog-nav />
  <div class="max-w-3xl mx-auto bg-white shadow-md p-6 sm:p-8 rounded-lg mt-[100px] space-y-6">


    <!-- Title  -->
    <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 leading-snug break-words">
      {{ $post->title }}
    </h1>






    <!-- Meta Info -->
    <div class="text-sm text-gray-500">
      By <span class="font-medium text-gray-700">{{ $post->user->name }}</span>
      • {{ $post->created_at->setTimezone('+05:00')->format('F j, Y') }}
      at {{ $post->created_at->setTimezone('+05:00')->format('g:i A') }}
    </div>

    <!-- Image -->
    @if ($post->image_path)
    <img src="{{ asset('storage/' . $post->image_path) }}"
      alt="Post Image"
      class="w-full h-64 sm:h-72 object-cover rounded-lg border" />
    @endif

    <!-- Body  -->
    <div class="text-gray-800 leading-relaxed text-base sm:text-lg whitespace-pre-line break-words">
      {{ $post->body }}
    </div>


    <!-- Like & Views  -->
    <div class="mt-6 flex items-center gap-6 text-gray-600 text-sm">

      <!-- Like icon  -->
      <x-like-button :post="$post" />

      <!-- view icon -->
      <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        </svg>
        <span>{{ $post->views }}</span>
      </div>

    </div>



    <!-- similar post  -->
    <hr class="my-48 border-gray-300" style="margin-top: 16rem; margin-bottom: 1rem;" />

    @if($similarPosts->count())
    <section class=" similar-posts">
      <h3 class="text-xl font-bold mb-2 border-l-4 border-orange-500 pl-3 text-gray-800">
        Similar Posts
      </h3>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($similarPosts as $post)
        <x-similar-card :post="$post" />
        @endforeach
      </div>
    </section>
    @endif


    <!-- Action Buttons -->
    <div class="flex justify-between items-center pt-6 border-t">

      {{-- Return to Home --}}
      <x-button href="{{ route('posts.index') }}" class="bg-gray-100 text-gray-700 hover:bg-blue-800">
        ← Return to Home
      </x-button>

      <!-- Owner Actions -->
      @auth
      @if (auth()->id() === $post->user_id)
      <div class="flex items-center gap-3">
        {{-- Edit Button --}}
        <x-button href="{{ route('posts.featured.edit') }}" class="bg-blue-600 hover:bg-blue-800">
          Edit
        </x-button>

        {{-- Delete Button with custom light style --}}
        <x-message-box
          :post="$post"
          asButton="true"
          class="inline-flex items-center px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-100 transition">
          Delete
        </x-message-box>






      </div>
      @endif
      @endauth


    </div>

  </div>
  <script>
    function likePost(postId) {
      if (localStorage.getItem(`liked_post_${postId}`)) {
        alert("You already liked this post!");
        return;
      }

      fetch(`/posts/${postId}/like`, {
          method: "POST",
          headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            "Accept": "application/json",
          },
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            const countEl = document.getElementById(`like-count-${postId}`);
            countEl.textContent = data.count;

            localStorage.setItem(`liked_post_${postId}`, "true");
          }
        });
    }
  </script>


</x-layout>