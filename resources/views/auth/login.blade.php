<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pawsome Essentials</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('assets/css/Login.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container" id="main-container">
        <div class="overlay-container">
            <img src="{{ asset('assets/images/overlay-logo.svg') }}" alt="Description of the image" style="width: 400px; height: 300px;">
            <h1>Pawsome Essentials Delivered with Love!</h1>
            <p>Login to quickly reorder your favorite essentials, and track your local delivery right to your doorstep.  Experience the convenience of loving care for your furry friends."</p>
        </div>
        <div class="form-container sign-in" id="signin-container">
            <h2>Welcome Back!</h2>
            <p>Log In To Your Account</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
               <div class="mb-3">
                    
                    <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div> 

                <div class="remember-forgot">
        <label for="remember_me" class="form-check-label">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            {{ __('Remember me') }}
        </label>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="forgot-password">
                {{ __('Forgot your password?') }}
            </a>
        @endif
    </div>

    <button type="submit" class="btn">Login</button>
</form>

            <p class="signup-link">Don't have an account? <a id="show-signup" href="{{ route('register') }}">Register</a></p>
        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

</body>
</html>