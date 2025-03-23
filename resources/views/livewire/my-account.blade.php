<div class="container">
    <div class="row ">
          <div class="col-md-12 px-5 py-3 mt-2 rounded shadow-sm custom-card-design ">
    <h4 class="mb-4">Personal Information</h4>
        <div class=" mb-3">
            <img src="profile-image-url" alt="Profile Picture" class="rounded-circle" width="80" height="80">
            <button class="btn btn-link ms-3 ">Edit Profile Information</button>
        </div>


       
        <form wire:submit.prevent="updateProfile " style="margin-right: 400px;">
            <div class="mb-3 ">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control bg-[#F1F1F1]" id="username" wire:model="username" required>
                @error('username') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>
            
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" wire:model="dob" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div>
                    <input type="radio" id="male" wire:model="gender" value="male"> <label for="male">Male</label>
                    <input type="radio" id="female" wire:model="gender" value="female" class="ms-3"> <label for="female">Female</label>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" wire:model="phone" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" wire:model="email" required>
                @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>
            
            @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !Auth::user()->hasVerifiedEmail())
                <div class="alert alert-warning mt-3">
                    <p>Your email address is unverified.</p>
                    <button wire:click="sendVerificationEmail" class="btn btn-link">Click here to re-send the verification email.</button>
                </div>
            @endif
            
  
        </form>

            <h4>Change Username & Email</h4>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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
                    <button type="submit" id="cust-btn" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>

        <div class="col-md-12 px-5 py-3 mt-3 mt-md-5 rounded shadow-sm custom-card-design">
            <h4>Change Password</h4>
            <form wire:submit.prevent="updatePassword" class="mt-3">
                <!-- Current Password Field -->
                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" wire:model="currentPassword" required>
                    @error('currentPassword') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- New Password Field -->
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" wire:model="newPassword" required>
                    @error('newPassword') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="newPasswordConfirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="newPasswordConfirmation" wire:model="newPasswordConfirmation" required>
                    @error('newPasswordConfirmation') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Save Button -->
                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
 
        <div class="col md-12  p-3 mt-5 rounded shadow-sm custom-card-design px-5 py-3">
        <h4>Delete Account</h4>
        <form wire:submit.prevent="confirmDelete" class="mt-3">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" wire:model="password" required>
                @error('password') <div class="text-danger mt-1">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </div>
        </form>
    </div>
    </div>
</div>


