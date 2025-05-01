    <x-slot name="title">
        Forgot Password - Pawsome Essentials
    </x-slot>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/forgot.css') }}" rel="stylesheet">

    <div class="container" id="main-container">
        <div class="form-container">
            <div class="back-link">
                <a href="{{ route('login') }}" class="arrow-container">
                    <i class="bi bi-arrow-left"></i> Back to login
                </a>
            </div>
            
            <h2>Forgot Your Password?</h2>
            <p>Enter your email address and we'll send you a password reset link.</p>

            <x-auth-session-status class="mb-4 alert alert-success" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <button type="submit" class="btn">EMAIL PASSWORD RESET LINK</button>
            </form>
        </div>
    </div>

