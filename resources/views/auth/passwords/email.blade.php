<x-layout>
  <div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Forgot Password</h1>

    @if (session('status'))
    <x-message :message="session('status')" type="success" />
    @endif



    <form method="POST" action="{{ route('password.otp.send') }}" class="space-y-6">
      @csrf
      <x-form.label for="email">Email</x-form.label>
      <x-form.input id="email" name="email" type="email" required />
      @if ($errors->any())
      <x-message :message="$errors->first()" type="error" />
      @endif

      <div class="flex justify-end">
        <x-form.button>Send OTP</x-form.button>
      </div>
    </form>
  </div>
</x-layout>