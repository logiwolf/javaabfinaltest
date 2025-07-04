<x-layout>
  <div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Register</h1>
    <form method="POST" action="{{ route('register.submit') }}" class="space-y-6">
      @csrf

      <div>
        <x-form.label for="name">Full Name</x-form.label>
        <x-form.input id="name" name="name" placeholder="John Doe" required />
      </div>

      <div>
        <x-form.label for="email">Email</x-form.label>
        <x-form.input id="email" name="email" type="email" placeholder="you@example.com" required />
      </div>

      <div>
        <x-form.label for="password">Password</x-form.label>
        <x-form.input id="password" name="password" type="password" required />
      </div>

      <div>
        <x-form.label for="password_confirmation">Confirm Password</x-form.label>
        <x-form.input id="password_confirmation" name="password_confirmation" type="password" required />
      </div>

      <div class="flex justify-end gap-3">
        <a href="{{ route('posts.index') }}"
          class="px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-100 transition">
          Cancel
        </a>
        <x-form.button>Register</x-form.button>
      </div>
    </form>
  </div>
</x-layout>