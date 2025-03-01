<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Layout</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Afacad:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/signin-up.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container" id="main-container">
        <div class="overlay-container">
            <img src="{{ asset('assets/images/brand-logo.svg') }}"  alt="Description of the image" style="width: 300px; height: 300px;"> 
            <h1>Pawsome Essentials Delivered with Love!</h1>
            <p>This is some example text inside the container.You can add more text and other elements as needed.</p>
        </div>
      
        <div class="form-container sign-up" id="signup-container">
            <h2>Create Account</h2>
            <p>Join us by filling out the details</p>
            <input type="text" class="form-control" placeholder="Username">
            <input type="email" class="form-control" placeholder="Email">
            <input type="password" class="form-control" placeholder="Password">
            <div class="terms-container">
                <input type="checkbox" name="terms" id="terms">
                <label for="terms">Agree with <a href="#">Terms of Service</a></label>
            </div>
            <button class="btn">Sign Up</button>
            <p class="signup-link">Already have an account? <a id="show-signin" href="#">Sign in</a></p>
        </div>
        
    </div>
    <!-- Scripts -->
    <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>


    <script>
   
    </script>
</body>
</html>