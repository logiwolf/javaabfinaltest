<x-layout>

    <x-blog-nav />

    <section class="px-4 sm:px-6 mb-8 max-w-7xl mx-auto pt-24">
        @if($featuredPost)

        <x-featured-post :post="$featuredPost" />
        @endif

        @if($popularPosts->count())
        <section class="mt-16">
            <h2 class="text-xl font-bold mb-4 text-gray-800 border-l-4 border-orange-500 pl-3">
                Popular This Week
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach($popularPosts as $post)
                <x-popular-card :post="$post" />
                @endforeach
            </div>
        </section>
        @endif


        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Recent Blog</h2>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($recentPosts as $post)
            <x-small-card :post="$post" />
            @endforeach
        </div>
    </section>



    @if ($explorePosts->count() > 0)
    <section id="explore-more" class="px-4 sm:px-6 mb-8 max-w-7xl mx-auto mt-12">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Explore More</h2>

        @foreach ($explorePosts->values() as $post)
        <x-wide-card :post="$post" />
        @endforeach

        <div class="text-center mt-8">
            <x-button href="{{ route('posts.exploreAll') }}" class="bg-orange-500 hover:bg-orange-600 text-white">
                View All Posts
            </x-button>
        </div>
    </section>
    @endif

    <script>
        window.addEventListener('load', () => {
            if (window.location.search.includes('load_more')) {
                const explore = document.getElementById('explore-more');
                if (explore) explore.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    </script>

</x-layout>