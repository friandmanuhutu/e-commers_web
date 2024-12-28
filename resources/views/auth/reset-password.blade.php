<x-guest-layout>
    <!-- Reset Password Form -->
    <form method="POST" action="{{ route('password.store') }}" class="form-container p-6 bg-white shadow-md rounded-lg">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="input-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input-group mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="input-group mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-center mt-6">
            <x-primary-button class="bg-indigo-500 text-white hover:bg-indigo-600">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Inline CSS -->
    <style>
        /* Background styling */
        body {
            background-color: #f3f4f6;
            font-family: 'Arial', sans-serif;
            height: 100vh; /* Full viewport height */
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            margin: 0; /* Remove default margin */
        }

        /* Form container styling */
        .form-container {
            max-width: 400px;
            width: 600px;
            padding: 2rem;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Input group styling */
        .input-group {
            margin-bottom: 1.5rem;
        }

        /* Label styling */
        x-input-label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        /* Input field styling */
        x-text-input {
            width: 120%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-size: 1rem;
            color: #4b5563;
            background-color: #f9fafb;
        }

        /* Focused input border color */
        x-text-input:focus {
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5);
        }

        /* Error message styling */
        .x-input-error {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        /* Submit button styling */
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

        /* Submit button hover effect */
        .x-primary-button:hover {
            background-color: #4f46e5;
        }
    </style>
</x-guest-layout>
