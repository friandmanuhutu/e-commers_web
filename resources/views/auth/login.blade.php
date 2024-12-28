<x-guest-layout>
    <!-- Logo -->
    <div class="logo-container text-center mb-8">
        <img src="images/E-AS.png" alt="Logo" class="logo w-32 mx-auto">
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="form-container p-6 bg-white shadow-md rounded-lg">
        @csrf

        <!-- Email Address -->
        <div class="input-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-group mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-indigo-500 text-white hover:bg-indigo-600">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Inline CSS -->
    <style>
        /* Background styling */
        body {
            background-color: #f3f4f6;
            font-family: 'Arial', sans-serif;
            padding-bottom: 50px;
        }

        /* Logo container */
        .logo-container {
            margin-top: 30px;
        }

        /* Logo styling */
        .logo {
            width: 100px; /* Adjust the size of your logo */
            margin: 0 auto;
        }

        /* Styling form */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Input styling */
        .input-group {
            margin-bottom: 1.5rem;
        }

        /* Label styling */
        x-input-label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        /* Input field */
        x-text-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            color: #4b5563;
            background-color: #f9fafb;
        }

        /* Focus input border color */
        x-text-input:focus {
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5);
        }

        /* Error message */
        .x-input-error {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        /* Password input type styling */
        input[type="password"] {
            font-family: 'Arial', sans-serif;
            letter-spacing: 1px;
        }

        /* Primary button */
        .x-primary-button {
            padding: 0.75rem 1.5rem;
            background-color: #6366f1;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            border: none;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        /* Primary button hover effect */
        .x-primary-button:hover {
            background-color: #4f46e5;
        }

        /* Link styling */
        a {
            text-decoration: none;
            color: #6366f1;
        }

        a:hover {
            color: #4f46e5;
        }

        /* Flex container for actions */
        .flex {
            display: flex;
            align-items: center;
        }

        /* Small margin for link and button container */
        .flex.items-center.justify-between {
            margin-top: 1.5rem;
        }
    </style>
</x-guest-layout>
