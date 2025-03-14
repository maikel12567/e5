<x-guest-layout>
    <div class="flex h-screen">
        <!-- Left Side - Orange Background -->
        <div class="w-1/2 bg-white flex items-center justify-center">
            <h1 class="text-5xl font-bold text-black">Welcome Back!</h1>
        </div>

        <!-- Right Side - Form -->
        <div class="w-1/2 flex items-center justify-center bg-black">
            <form method="POST" action="{{ route('login') }}"
                class="w-3/4 max-w-md bg-black border-[#3E3E3A] p-12 text-white border rounded-lg shadow-md">
                @csrf

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Email Address -->
                <div>
                    <x-input-label for="Name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-black shadow-sm"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password and Submit -->
                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3 bg-white text-black">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
