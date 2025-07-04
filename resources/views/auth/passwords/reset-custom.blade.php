<x-layout>
  <div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Reset Password</h1>

    @if ($errors->any())
    <x-message :message="$errors->first()" type="error" />
    @endif

    <form method="POST" action="{{ route('password.custom.update') }}" class="space-y-6">
      @csrf
      <x-form.label for="password">New Password</x-form.label>
      <x-form.input id="password" name="password" type="password" required />
      <x-form.label for="password_confirmation">Confirm Password</x-form.label>
      <x-form.input id="password_confirmation" name="password_confirmation" type="password" required />
      <div class="flex justify-end">
        <x-form.button>Update</x-form.button>
      </div>
    </form>
  </div>
</x-layout>