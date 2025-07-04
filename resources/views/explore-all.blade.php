<x-layout>
  <x-blog-nav />

  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-3xl font-bold mb-6 text-gray-900">Explore All Posts</h1>

    <!-- Filter Form  -->
    <form method="GET" action="{{ route('posts.exploreAll') }}" class="space-y-6 mb-8 lg:space-y-0 lg:flex lg:items-end lg:space-x-6">

      <!-- Date  Filter  -->
      <div class="flex-1">
        <label for="date_from" class="block mb-1 font-semibold text-gray-700">Date from:</label>
        <input
          type="date"
          name="date_from"
          id="date_from"
          value="{{ request('date_from') }}"
          class="border rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-orange-500" />
      </div>

      <!-- Date To Filter -->
      <div class="flex-1">
        <label for="date_to" class="block mb-1 font-semibold text-gray-700">Date to:</label>
        <input
          type="date"
          name="date_to"
          id="date_to"
          value="{{ request('date_to') }}"
          class="border rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-orange-500" />
      </div>

      <!-- Writer Filter -->
      <div class="flex-1">
        <label for="user_id" class="block mb-1 font-semibold text-gray-700">Filter by writer:</label>
        <select
          name="user_id"
          id="user_id"
          class="border rounded px-3 py-2 w-full focus:outline-none focus:ring-2 focus:ring-orange-500">
          <option value="">All Writers</option>
          @foreach ($users as $user)
          <option value="{{ $user->id }}" @selected(request('user_id')==$user->id)>
            {{ $user->name }}
          </option>
          @endforeach
        </select>
      </div>

      <!-- Buttons -->
      <div class="flex items-center space-x-3 mt-4 lg:mt-0">
        <button
          type="submit"
          class="bg-orange-500 text-white px-5 py-2 rounded hover:bg-orange-600 transition">
          Filter
        </button>

        <a href="{{ route('posts.exploreAll') }}" class="text-gray-600 underline hover:text-gray-900">
          Clear Filters
        </a>
      </div>
    </form>

    <!-- Posts Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      @forelse ($posts as $post)
      <x-small-card :post="$post" />
      @empty
      <p class="col-span-full text-center text-gray-500">No posts found.</p>
      @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
      {{ $posts->withQueryString()->links() }}
    </div>
  </div>
</x-layout>