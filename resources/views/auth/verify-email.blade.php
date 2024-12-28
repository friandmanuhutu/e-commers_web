<x-guest-layout>
    <!-- Email Verification Content -->
    <div class="form-container p-6 bg-white shadow-md rounded-lg">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <!-- Resend Verification Email Button -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <x-primary-button class="bg-indigo-500 text-white hover:bg-indigo-600">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </form>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
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

        /* Logout button styling */
        button {
            padding: 0.5rem 1rem;
            background: none;
            border: none;
            cursor: pointer;
            text-decoration: underline;
            color: #4b5563;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        /* Logout button hover effect */
        button:hover {
            color: #1f2937;
        }
    </style>
</x-guest-layout>
