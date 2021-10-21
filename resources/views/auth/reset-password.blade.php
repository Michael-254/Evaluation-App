<x-guest-layout>
    <div class="bg-gray-300 mx-auto h-screen flex justify-center items-center">
        <div class="w-96 p-6 rounded-lg bg-gray-100 shadow-xl">

            <div class="flex justify-center">
                <img src="{{asset('assets/dist/img/logo.png')}}" alt="" class="w-16 h-16">
            </div>

            <h1 class="text-green-800 text-3xl pt-3">Reset Password</h1>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('password.update') }}" class="pt-4">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="relative pt-3">
                    <x-label for="email" class="text-green-800 text-xs font-bold pl-3 pt-2 absolute uppercase" :value="__('Email')" />

                    <x-input id="email" class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-green-200 bg-gray-100 text-gray-900" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                </div>

                <div class="relative pt-3">
                    <label for="password" class="text-green-800 text-xs font-bold pl-3 pt-2 absolute uppercase">Password</label>

                    <input id="password" type="password" class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-green-200 bg-gray-100 text-gray-900" name="password" required autocomplete="current-password" placeholder="Password">
                </div>

                <div class="relative pt-3">
                    <label for="password-confirm" class="text-green-800 text-xs font-bold pl-3 pt-2 absolute uppercase">Re-enter Password</label>

                    <input id="password-confirm" type="password" class="w-full p-3 pt-8 rounded focus:outline-none focus:bg-green-200 bg-gray-100 text-gray-900" name="password_confirmation" required placeholder="Confirm">
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full rounded py-2 px-3 uppercase text-center bg-green-800 text-white hover:bg-green-600 font-bold">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>