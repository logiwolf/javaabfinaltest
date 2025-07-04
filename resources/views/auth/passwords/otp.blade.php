<x-layout>
  <div class="max-w-md mx-auto bg-white shadow p-6 rounded-lg mt-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Enter OTP</h1>



    <form method="POST" action="{{ route('password.otp.check') }}" class="space-y-6 mt-4">
      @csrf
      <x-form.input id="email" name="email" type="hidden" value="{{ session('email') }}" />

      <x-form.label for="otp">OTP</x-form.label>
      <x-form.input
        id="otp"
        name="otp"
        type="text"
        required
        :disabled="$errors->has('otp')" />

      @if ($errors->any())
      <x-message :message=" $errors->first()" type="error" />

      {{--Cancel Button shown only when there is an error --}}
      <div class="mt-4 text-right">
        <a href="{{ route('password.request') }}" class="text-red-600 underline hover:text-red-800">
          Cancel and request new OTP
        </a>
      </div>
      @endif



      <div class="flex justify-end">
        <x-form.button>Verify OTP</x-form.button>
      </div>
    </form>
  </div>
</x-layout>