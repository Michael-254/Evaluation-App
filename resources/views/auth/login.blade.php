<x-guest-layout>
    <div class="mx-auto h-screen flex justify-center items-center bg-gray-300">
        <div class="w-96 bg-gray-100 rounded-lg shadow-xl p-6">

            <div class="flex justify-center">
                <img src="{{asset('assets/dist/img/logo.png')}}" alt="" class="w-16 h-16">
            </div>

            <h1 class="text-green-800 text-3xl pt-5">Welcome Back</h1>
            <h2 class="text-green-800">Enter your credentials below</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" class="pt-6">
                @csrf

                <div class="relative">
                    <label for="email" class="uppercase text-green-800 text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                    <div>
                        <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-gray-100 text-gray-900 focus:outline-none focus:bg-green-200" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="your@email.com">
                    </div>
                </div>

                <div class="relative pt-3">
                    <label for="password" class="uppercase text-green-800 text-xs font-bold absolute pl-3 pt-2">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="pt-8 w-full rounded p-3 bg-gray-100 text-gray-900 focus:outline-none focus:bg-green-200" name="password" autocomplete="current-password" placeholder="Password">
                    </div>
                </div>

                <div class="pt-2">
                    <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="text-green-800" for="remember">Remember Me</label>
                </div>

                <div class="pt-8">
                    <button type="submit" class="w-full bg-green-800 py-2 px-3 text-center uppercase rounded text-white font-bold hover:bg-green-600">
                        Login
                    </button>
                </div>

                <div class="flex justify-between pt-8 text-green-800 text-sm font-bold">
                    <a class="hover:text-blue-500" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                    <a class="hover:text-blue-500" href="{{ route('register') }}">
                        Register
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>