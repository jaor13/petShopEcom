<div class="container">
    <div class="row">
        <!-- Read-Only Personal Information -->
        @if (!$isEditing)
        
            <div class="col-md-12 px-5 py-3 mt-2 rounded shadow-sm custom-card-design">
                <h4 class="mb-3">Personal Information</h4>
                <div class="mb-3  inline-flex lign-items-center">
    <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('assets/images/default-1.gif') }}"
        alt="Profile Photo" class="profile-img rounded-circle mb-2"
        style="width: 100px; height: 100px; cursor: pointer;">
    
    <button class="btn ms-3" wire:click="enableEditing" style="color: #00DCE3;">
        <i class="fa-solid fa-pen-to-square me-1" style="color: #00DCE3; font-size: 20px;"></i>
        Edit Profile Information
    </button>
</div>
<div style="margin-bottom: 50px;">
<div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" value="{{ $username }}" readonly>
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" value="{{ $email }}" readonly>
    </div>
</div>

<div class="row mb-3">
    <!-- Date of Birth Section -->
    <div class="col-md-6">
        <label class="form-label">Date of Birth</label>
        <div class="input-group">
            <input type="date" class="form-control" value="{{ $dob }}" readonly>
        </div>
    </div>


    <!-- Gender Section -->
    <div class="col-md-6">
        <label class="form-label">Gender</label>
        <div class="d-flex align-items-center">
            <div class="form-check me-3">
                <input type="radio" id="maleReadonly" name="gender" value="male" 
                    class="form-check-input" 
                    {{ ($gender ?? '') === 'male' ? 'checked' : '' }} disabled>
                <label for="maleReadonly" class="form-check-label">Male</label>
            </div>
            <div class="form-check">
                <input type="radio" id="femaleReadonly" name="gender" value="female" 
                    class="form-check-input ms-2" 
                    {{ ($gender ?? '') === 'female' ? 'checked' : '' }} disabled>
                <label for="femaleReadonly" class="form-check-label">Female</label>
            </div>
        </div>
    </div>
    </div>

    <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" value="{{ $cp_num }}" readonly>
                </div>
</div>
              
                @if (Auth::user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !Auth::user()->hasVerifiedEmail())
                    <div class="alert alert-warning mt-3">
                        <p>Your email address is unverified.</p>
                        <button wire:click="sendVerificationEmail" class="btn btn-link">Click here to re-send the verification
                            email.</button>
                    </div>

                    @if (session()->has('verification-link-sent'))
                        <div class="alert alert-success mt-3">
                            A new verification link has been sent to your email address.
                        </div>
                    @endif
                @endif
</div>

            <h4>Change Password</h4>
            <form wire:submit.prevent="updatePassword" class="mt-3 mb-4">
                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" wire:model="currentPassword"
                        required>
                    @error('currentPassword') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" wire:model="newPassword" required>
                    @error('newPassword') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="newPasswordConfirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="newPasswordConfirmation"
                        wire:model="newPasswordConfirmation" required>
                    @error('newPasswordConfirmation') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-success">Update Password</button>
            </form>
      
            </div>
        @endif

        <!-- Editable Form -->
        @if ($isEditing)
            <div class="col-md-12 px-5 py-3 mt-2 rounded shadow-sm custom-card-design">
                <h4>Edit Profile Information</h4>
                <form wire:submit.prevent="updateProfile" class="mt-3">
                    <label for="profile-picture-upload">
                       <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('assets/images/default-1.gif') }}"
                       class="profile-img rounded-circle mb-2"
                       style="width: 100px; height: 100px; cursor: pointer;">
                    </label>
                    <input type="file" id="profile-picture-upload" wire:model="profile_picture" style="display: none;">
              
                    <div style="margin-bottom: 50px;">
                    <div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" wire:model="username" required autofocus>
        @error('username') <div class="text-danger mt-1">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6">
    <label class="form-label">Email</label>
                        <input type="email" class="form-control" wire:model="email" required>
                        @error('email') <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
    </div>
</div>


                    <div class="row mb-3">
    <!-- Date of Birth Section -->
    <div class="col-md-6">
    <label class="form-label">Date of Birth</label>
    <input type="date" class="form-control" wire:model="dob" required>
        </div>
   


    <!-- Gender Section -->
    <div class="col-md-6">
    <label class="form-label">Gender</label>
    <div class="d-flex align-items-center">
        <div class="form-check me-3">
            <input type="radio" wire:model="gender" value="male" 
                   class="form-check-input" id="maleRadio">
            <label class="form-check-label" for="maleRadio">Male</label>
        </div>
        <div class="form-check">
            <input type="radio" wire:model="gender" value="female" 
                   class="form-check-input" id="femaleRadio">
            <label class="form-check-label" for="femaleRadio">Female</label>
        </div>
    </div>
</div>
    </div>


    <div class="row mb-3">
                <div class="col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" wire:model="cp_num" required>
                </div>
</div>
    

                    </div>
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" wire:click="cancelEditing">Cancel</button>
                    </div>
                </form>
            </div>
        @endif

      

        <div class="col-md-12 p-3 mt-3 rounded shadow-sm custom-card-design px-5 py-3">
            <h4>Delete Account</h4>
            <form wire:submit.prevent="confirmDelete" class="mt-3 mb-4">
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