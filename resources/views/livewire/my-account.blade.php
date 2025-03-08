<div>
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="section-title">Manage your Account Details</h2>
    <p class="section-description">Update your account's profile information and email address.</p>

    <form wire:submit.prevent="updateProfile" class="mt-3">
        <!-- Name Field -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" wire:model="username" required autofocus>
            @error('username') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" wire:model="email" required>
            @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <!-- Always show email verification alert if the email is unverified -->
        @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !Auth::user()->hasVerifiedEmail())
            <div class="alert alert-warning mt-3">
                <p>Your email address is unverified.</p>
                <button wire:click="sendVerificationEmail" class="btn btn-link">Click here to re-send the verification email.</button>
            </div>

            @if (session()->has('verification-link-sent'))
                <div class="alert alert-success mt-3">
                    A new verification link has been sent to your email address.
                </div>
            @endif
        @endif

        <!-- Save Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
