<x-layout>
  <div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Reset Password</h1>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">

      <div>
        <x-form.label for="email">Email</x-form.label>
        <x-form.input id="email" name="email" type="email" value="{{ old('email') }}" required />
      </div>

      <div>
        <x-form.label for="password">New Password</x-form.label>
        <x-form.input id="password" name="password" type="password" required />
      </div>

      <div>
        <x-form.label for="password_confirmation">Confirm Password</x-form.label>
        <x-form.input id="password_confirmation" name="password_confirmation" type="password" required />
      </div>

      <div class="flex justify-end">
        <x-form.button>Reset Password</x-form.button>
      </div>
    </form>
  </div>
</x-layout>