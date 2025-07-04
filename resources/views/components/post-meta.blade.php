<div class="flex items-center gap-4 text-sm text-gray-500">
  <div class="flex items-center gap-1">
    <x-heroicon-o-eye class="w-4 h-4" /> {{ $post->views }}
  </div>
  <div class="flex items-center gap-1">
    <x-heroicon-o-thumb-up class="w-4 h-4" /> {{ $post->like_count }}
  </div>
</div>