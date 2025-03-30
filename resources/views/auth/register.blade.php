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
            <h2 style=" color:#4F4F4F;">Create Account</h2>
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
                        Agree with&nbsp;<a href="#" id="terms-link" data-bs-toggle="modal" data-bs-target="#termsModal">Terms of Service</a>
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

    <!-- Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"> <!-- Added custom class modal-lg -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms of Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Thank you for visiting Aricuz Pet Shop. By using this and purchasing our products, you agree to the following Terms and Conditions. If you do not agree with any part of these terms, please refrain from using the Site.<br><br>

                    <strong>1. Acceptance of Terms</strong><br>
                    By accessing or using Aricuz, you agree to comply with and be bound by these Terms and Conditions, our Privacy Policy, and other applicable policies. We may update these terms at any time, and we encourage you to review this page regularly for any changes.<br><br>

                    <strong>2. Products and Services</strong><br>
                    Aricuz offers a wide range of pet products, including but not limited to pet food, toys, grooming supplies, bedding, health products, and accessories. We reserve the right to add, modify, or discontinue products at any time without notice.<br><br>

                    <strong>3. Account Registration</strong><br>
                    To make purchases on our website, you may need to create an account. You agree to provide accurate and complete information during registration and to update it as needed to keep it current. You are responsible for maintaining the confidentiality of your account information.<br><br>

                    <strong>4. Order Acceptance and Payment</strong><br>
                    All orders are subject to acceptance and availability. We reserve the right to refuse or cancel orders at any time due to product availability, errors in pricing or product descriptions, or any other reason. Payments for products are processed securely via our designated payment gateways.<br><br>

                    <strong>5. Shipping and Delivery</strong><br>
                    We aim to process orders as quickly as possible. Shipping times may vary depending on the destination. Any shipping charges will be disclosed to you during checkout. We are not responsible for any delays caused by third-party carriers or customs issues.<br><br>

                    <strong>6. Pricing and Payment Terms</strong><br>
                    All prices listed on the website are in Philippine peso and may be subject to change without notice. Taxes and shipping fees may apply depending on your location and will be calculated at checkout. We accept payments via gcash, maya and cash on delivery.<br><br>

                    <strong>7. Product Availability</strong><br>
                    We make every effort to ensure that all products on our site are available for purchase, but we cannot guarantee availability at all times. If an item is out of stock, we will notify you via email or through your account.<br><br>

                    <strong>8. Customer Responsibilities</strong><br>
                    You are responsible for ensuring that any pet products you purchase are suitable for your pet’s specific needs. We recommend consulting a veterinarian for advice on food, health products, or supplements before purchasing.<br><br>

                    <strong>9. Intellectual Property</strong><br>
                    All content on the Site, including text, images, logos, and trademarks, is owned or licensed by Aricuz. You may not reproduce, distribute, or use any content from the Site without permission.<br><br>

                    <strong>10. Limitation of Liability</strong><br>
                    Aricuz will not be held liable for any damages arising from the use of the Site or products purchased, including but not limited to any indirect, incidental, special, or consequential damages. Our liability is limited to the amount paid for the product(s) in question.<br><br>

                    <strong>12. Privacy and Security</strong><br>
                    We are committed to protecting your privacy. Please review our Privacy Policy to understand how we collect, use, and protect your personal information.<br><br>

                    <strong>13. Governing Law</strong><br>
                    These Terms and Conditions are governed by the laws of the Philippines. Any disputes related to these Terms and Conditions shall be resolved in the appropriate courts of the Philippines.<br><br>

                   <br>By using our Site, you confirm that you have read, understood, and agreed to these Terms and Conditions.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="accept-terms" data-bs-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.iconify.design/iconify-icon/2.3.0/iconify-icon.min.js"></script>
    <script src="https://code.iconify.design/3/3.1.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        document.getElementById('accept-terms').addEventListener('click', function() {
            document.getElementById('terms').checked = true;
        });
    </script>
</body>
</html>