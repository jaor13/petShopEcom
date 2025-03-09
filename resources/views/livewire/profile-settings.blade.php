<div class="profile text-center py-4" style="background-color: #f8f9fa;">
    <!-- Profile Picture -->
    <label for="profile-picture-upload">
        <img src="{{ $profile_picture_url }}" 
             alt="Profile Photo" 
             class="profile-img rounded-circle mb-2" 
             style="width: 100px; height: 100px; cursor: pointer;">
    </label>
    <input type="file" id="profile-picture-upload" wire:model="profile_picture" style="display: none;">

    <!-- Display Updated Username -->
    <h6 class="profile-name">Hi {{ $username }}!</h6>

    @error('profile_picture') <span class="text-danger">{{ $message }}</span> @enderror
</div>
