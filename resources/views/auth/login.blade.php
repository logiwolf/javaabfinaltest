<x-layout>
  <div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Login</h1>
    <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
      @csrf

      <div>
        <x-form.label for="email">Email</x-form.label>
        <x-form.input id="email" name="email" type="email" placeholder="you@example.com" required />
      </div>

      <div>
        <x-form.label for="password">Password</x-form.label>
        <x-form.input id="password" name="password" type="password" required />
      </div>
      <div class="text-right mt-2">
        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
          Forgot Password?
        </a>
      </div>

      <div class="flex justify-end">
        <x-form.button>Login</x-form.button>
      </div>
    </form>

    {{-- Register Link --}}
    <div class="mt-6 text-center text-sm text-gray-600">
      Don't have an account?
      <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
    </div>
  </div>
</x-layout>