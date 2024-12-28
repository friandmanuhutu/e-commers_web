<x-guest-layout>
    <!-- Forgot Password Content -->
    <div class="form-container p-6 bg-white shadow-md rounded-lg">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="bg-indigo-500 text-white hover:bg-indigo-600">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>

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
            width: 100%;
            padding: 2rem;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Input styling */
        input[type="email"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            margin-top: 0.5rem;
            font-size: 1rem;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.2s ease;
        }

        input[type="email"]:focus {
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3);
        }

        /* Button styling */
        x-primary-button {
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

        /* Button hover effect */
        x-primary-button:hover {
            background-color: #4f46e5;
        }
    </style>
</x-guest-layout>
