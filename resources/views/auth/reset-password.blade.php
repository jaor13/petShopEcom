<x-guest-layout>
<link href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link href="{{ asset('assets/css/resetpass.css') }}" rel="stylesheet">
    <div class="modal">
        <div class="modal-content">
            <a href="{{ route('login') }}" class="close-button arrow-container">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h2>Reset Password</h2>
            <p>Enter your new password.</p>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="input-container">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-container">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="confirm-button">RESET PASSWORD</button>
            </form>
        </div>
    </div>
</x-guest-layout>
