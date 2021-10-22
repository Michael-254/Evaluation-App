<x-guest-layout>
    <div class="mx-auto flex justify-center items-center bg-gray-300">
        <div class="w-96 p-6 rounded-lg bg-gray-100 shadow-xl">

            <div class="flex justify-center">
                <img src="{{asset('assets/dist/img/logo.png')}}" alt="" class="w-16 h-16">
            </div>

            <h1 class="text-green-800 text-3xl pt-3">Register</h1>
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}" class="pt-4">
                @csrf

                <div>
                    <x-label for="name" class="mb-2" :value="__('Name')" />

                    <input id="name" class="btn-blue" type="text" name="name" value="{{ old('name') }}" required autofocus />
                </div>

                <div class="pt-3">
                    <x-label for="job title" class="mb-2" :value="__('Job title')" />

                    <input id="job title" class="btn-blue" type="text" name="job_title" value="{{ old('job_title') }}" required autofocus />
                </div>

                <div class="pt-3">
                    <x-label for="email" class="mb-2">E-Mail</x-label>

                    <input id="email" type="email" class="btn-blue" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="your@email.com" />
                </div>

                <div class="pt-3">
                    <x-label for="site" class="mb-1">Site</x-label>

                    <select id="site" class="btn-blue" name="site" required>
                        <option value="">Select Site</option>
                        <option value="Head Office">Head Office</option>
                        <option value="Kiambere">Kiambere</option>
                        <option value="Dokolo">Dokolo</option>
                        <option value="Nyongoro">Nyongoro</option>
                        <option value="7 Forks">7 Forks</option>
                        <option value="Sosoma">Sosoma</option>
                        <option value="Kampala">Kampala</option>
                        <option value="Tanzania">Tanzania</option>
                    </select>
                </div>

                <div class="pt-3">
                    <x-label for="department" class="mb-1">Department</x-label>

                    <select id="department" class="btn-blue" name="department" required>
                        <option value="">Select Department</option>
                        <option value="IT">IT</option>
                        <option value="M&E">M&E</option>
                        <option value="Communications">Communications</option>
                        <option value="Accounts">Accounts</option>
                        <option value="Operations">Operations</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Forestry">Forestry</option>
                        <option value="Miti Magazine">Miti Magazine</option>
                    </select>
                </div>

                <div class="pt-3">
                    <x-label for="HOD_email" class="mb-2">HOD Email</x-label>

                    <input id="HOD_email" type="email" class="btn-blue" name="HOD_email" value="{{ old('HOD_email') }}" required autocomplete="email" autofocus placeholder="HOD@email.com" />
                </div>

                <div class="pt-3">
                    <x-label for="password" class="mb-2">Password</x-label>

                    <input id="password" type="password" class="btn-blue" name="password" required autocomplete="current-password" placeholder="Password" />
                </div>

                <div class="pt-3">
                    <x-label for="password-confirm" class="mb-2">Re-enter Password</x-label>

                    <input id="password-confirm" type="password" class="btn-blue" name="password_confirmation" required placeholder="Confirm" />
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full rounded py-2 px-3 uppercase text-center bg-green-800 text-white hover:bg-green-600 font-bold">Register</button>
                </div>

                <div class="pt-8 flex justify-between text-green-800 text-sm font-bold">
                    <a class="hover:text-blue-500" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                    <a class="hover:text-blue-500" href="{{ route('login') }}">Login</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>