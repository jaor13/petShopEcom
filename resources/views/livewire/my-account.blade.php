<div class="container">
    <div class="bg-white p-4 rounded shadow-sm">
        <h4 class="mb-4">Personal Information</h4>
        <div class="d-flex align-items-center mb-3">
            <img src="profile-image-url" alt="Profile Picture" class="rounded-circle" width="80" height="80">
            <button class="btn btn-link ms-3">Edit Profile Information</button>
        </div>
        
        <form wire:submit.prevent="updateProfile">
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control" id="username" wire:model="username" required>
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
            
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
    
    <div class="bg-white p-4 mt-4 rounded shadow-sm">
        <h4 class="mb-4">Change Password</h4>
        <form wire:submit.prevent="updatePassword">
            <div class="mb-3">
                <label for="currentPassword" class="form-label">Current Password</label>
                <input type="password" class="form-control" id="currentPassword" wire:model="currentPassword" required>
            </div>
            
            <div class="mb-3">
                <label for="newPassword" class="form-label">New Password</label>
                <input type="password" class="form-control" id="newPassword" wire:model="newPassword" required>
            </div>
            
            <div class="mb-3">
                <label for="newPasswordConfirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="newPasswordConfirmation" wire:model="newPasswordConfirmation" required>
            </div>
            
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
    
    <div class="bg-white p-4 mt-4 rounded shadow-sm">
        <h4 class="mb-4">Delete Account</h4>
        <form wire:submit.prevent="confirmDelete">
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" wire:model="password" required>
            </div>
            <button type="submit" class="btn btn-danger">Delete Account</button>
        </form>
    </div>
</div>
