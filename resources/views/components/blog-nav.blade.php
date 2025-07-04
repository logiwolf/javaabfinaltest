<div>

    <x-nav>
        <x-slot name="left">
            <div class="flex items-center space-x-6">
                <a href="{{ route('posts.index') }}" title="Home"
                    class="text-gray-600 hover:text-orange-600 text-xl">
                    <x-heroicon-o-home class="w-8 h-8 text-blue-500" />
                </a>
                @auth
                <x-button href="{{ route('posts.create') }}">Add Post</x-button>
                @endauth
            </div>
        </x-slot>

        <x-slot name="right">
            <div class="flex items-center space-x-4">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-600 hover:underline" type="submit">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
                @endauth
            </div>
        </x-slot>
    </x-nav>
</div>