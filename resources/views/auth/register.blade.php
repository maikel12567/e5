<x-guest-layout>
    <div class="flex h-screen">
        <!-- Left Side - Orange Background -->
        <div class="w-1/2 bg-orange-500 flex items-center justify-center">
            <h1 class="text-5xl font-bold text-white">Join Us Today!</h1>
        </div>

        <!-- Right Side - Form -->
        <div class="w-1/2 flex items-center justify-center bg-gray-100 dark:bg-gray-900">
            <form method="POST" action="{{ route('register') }}" class="w-3/4 max-w-md bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="username" :value="__('username')" />
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Already Registered -->
                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="bg-orange-500 hover:bg-orange-600 ml-3">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
