<x-guest-layout>
    <div class="mx-auto h-screen flex justify-center items-center bg-gray-300">
        <div class="w-96 bg-gray-100 rounded-lg shadow-xl p-6">

            <div class="flex justify-center">
                <img src="{{asset('assets/dist/img/logo.png')}}" alt="" class="w-16 h-16">
            </div>

            <h1 class="text-green-800 text-3xl pt-5">Access your PDF</h1>
            <h2 class="text-green-800">Enter your password below</h2>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('file.view') }}" class="pt-6">
                @csrf

                <div class="relative pt-3">
                    <label for="password" class="uppercase text-green-800 text-xs font-bold absolute pl-3 pt-2">PDF Password</label>

                    <div class="col-md-6">
                        <input id="password" type="text" class="pt-8 w-full rounded p-3 bg-gray-100 text-gray-900 focus:outline-none focus:bg-green-200" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="pt-8">
                    <button type="submit" class="w-full bg-green-800 py-2 px-3 text-center uppercase rounded text-white font-bold hover:bg-green-600">
                        View
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>