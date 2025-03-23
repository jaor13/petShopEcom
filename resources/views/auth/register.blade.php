<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pawsome Essentials</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/Register.css') }}" rel="stylesheet">
 
</head>
<body>
    <div class="container" id="main-container">
        <div class="form-container sign-up" id="signup-container">
            <h2>Create Account</h2>
            <p>Join us by filling out the details</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="{{ old('username') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <input type="text" name="fname" class="form-control" placeholder="First Name" value="{{ old('fname') }}" required autocomplete="fname">
                    <x-input-error :messages="$errors->get('fname')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <input type="text" name="lname" class="form-control" placeholder="Last Name" value="{{ old('lname') }}" required autocomplete="lname">
                    <x-input-error :messages="$errors->get('lname')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="terms-container mb-3">
    <label for="terms" class="form-check-label">
        <input type="checkbox" name="terms" id="terms" class="form-check-input" required>
        Agree with <a href="#">Terms of Service</a>
    </label>
</div>
                <button type="submit" class="btn">Register</button>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="signin-link">Already have an account? <a id="show-signup" href="{{ route('login') }}">Login</a></p>
                   
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <img src="{{ asset('assets/images/overlay-logo.svg') }}" alt="Description of the image" style="width: 400px; height: 300px;">
            <h1>Pawsome Essentials Delivered with Love!</h1>
            <p>Give your pet the best! Create an account for new foods, accessories, and loving delivery</p>
        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script> <script>
    </script>
</body>
</html>