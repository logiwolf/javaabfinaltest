@props(['post'])

<button
  onclick="likePost('{{ $post->id }}')"
  class="flex items-center text-gray-600 hover:text-red-600 transition"
  id="like-btn-{{ $post->id }}"
  aria-label="Like post">
  <svg
    id="like-icon-{{ $post->id }}"
    xmlns="http://www.w3.org/2000/svg"
    fill="none"
    viewBox="0 0 24 24"
    stroke="currentColor"
    class="w-6 h-6 mr-1">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
  </svg>
  <span id="like-count-{{ $post->id }}">{{ $post->like_count }}</span>
</button>