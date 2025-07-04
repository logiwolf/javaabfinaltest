<x-layout>
  <div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Forgot Password</h1>

    @if (session('status'))
    <div class="text-green-600 mb-4">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.otp.send') }}" class="space-y-6">
      @csrf
      <div>
        <x-form.label for="email">Email</x-form.label>
        <x-form.input id="email" name="email" type="email" placeholder="you@example.com" required />
      </div>

      <div class="flex justify-end">
        <x-form.button>Send Reset Link</x-form.button>
      </div>
    </form>
  </div>
</x-layout>