<x-guest-layout>
    <x-slot name="title">
        Forgot Password
    </x-slot>
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link href="{{ asset('assets/css/forgot.css') }}" rel="stylesheet">

    <div class="modal" id="forgot-password-modal">
        <div class="modal-content">
            <a href="{{ route('login') }}" class="close-button arrow-container">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div style="text-align: center;"> <h2>Forgot Your Password?</h2>
                <p>No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="input-container">
                        <label for="email">Email Account</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <button type="submit" class="confirm-button">EMAIL PASSWORD RESET LINK</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>