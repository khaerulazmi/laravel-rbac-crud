<x-guest-layout>
    <div class="max-w-md mx-auto mt-16 p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold text-center mb-6">{{ __('Login') }}</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full mt-1 py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
<div class="mb-4">
    <x-input-label for="password" :value="__('Password')" />

    <div class="relative">
        <x-text-input id="password" class="block w-full pr-10 py-3 mt-1"
            type="password" name="password" required autocomplete="current-password" />

        <button type="button"
            class="toggle-password absolute right-3 top-1/2 -translate-y-1/2 flex items-center justify-center text-gray-500 hover:text-gray-700 focus:outline-none">
            <svg class="icon-eye w-5 h-5" ...>...</svg>
            <svg class="icon-eye-off w-5 h-5 hidden" ...>...</svg>
        </button>
    </div>

    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>

            <!-- Remember Me + Forgot Password -->
            <div class="flex items-center justify-between mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-sm text-indigo-600 hover:text-indigo-900" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <x-primary-button class="w-full py-3 text-lg font-semibold flex items-center justify-center">
                {{ __('Login') }}
            </x-primary-button>
        </form>

        <!-- Register Link -->
        <p class="mt-6 text-center text-sm text-gray-600">
            {{ __("Don't have an account yet?") }}
            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                {{ __("Sign Up") }}
            </a>
        </p>
    </div>

    <!-- SCRIPT: Show/Hide Password -->
    <script>
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.parentElement.querySelector('input');
                const iconEye = button.querySelector('.icon-eye');
                const iconEyeOff = button.querySelector('.icon-eye-off');

                if (input.type === 'password') {
                    input.type = 'text';
                    iconEye.classList.add('hidden');
                    iconEyeOff.classList.remove('hidden');
                } else {
                    input.type = 'password';
                    iconEye.classList.remove('hidden');
                    iconEyeOff.classList.add('hidden');
                }
            });
        });
    </script>
</x-guest-layout>