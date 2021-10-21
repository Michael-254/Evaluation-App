<x-guest-layout>
    <div class="bg-gray-300 mx-auto h-screen flex justify-center items-center">
        <div class="w-96 p-6 rounded-lg bg-gray-100 shadow-xl">

            <div class="flex justify-center">
                <img src="{{asset('assets/dist/img/logo.png')}}" alt="" class="w-16 h-16">
            </div>

            <h1 class="text-green-800 text-3xl pt-4">Oh no!</h1>
            <h2 class="text-base text-green-800">Enter your email to reset password</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('password.email') }}" class="pt-4">
                @csrf

                <div class="relative">
                    <label for="email" class="uppercase text-green-800 text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                    <div>
                        <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-gray-100 text-gray-900 focus:outline-none focus:bg-green-200" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus placeholder="your@email.com">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-green-800 py-2 px-3 text-center uppercase rounded text-white font-bold hover:bg-green-600">
                        Send Reset Email
                    </button>
                </div>

                <div class="pt-4 flex justify-between text-green-800 text-sm font-bold">
                    <a class="hover:text-blue-500" href="{{ route('login') }}">Login</a>
                    <a class="hover:text-blue-500" href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>