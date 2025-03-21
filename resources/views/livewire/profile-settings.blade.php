<div class="profile text-center py-2 mt-3">
    <!-- Profile Picture -->
    <label for="profile-picture-upload">
        <img src="{{ $profile_picture_url }}" 
             alt="Profile Photo" 
             class="profile-img rounded-circle mb-2" 
             style="width: 100px; height: 100px; cursor: pointer;">
    </label>
    <input type="file" id="profile-picture-upload" wire:model="profile_picture" style="display: none;">

    <!-- Display Updated Username -->
    <h5 class="profile-name" style="color:#3D3D3D;">Hi, {{ $username }}!</h5>

    @error('profile_picture') <span class="text-danger">{{ $message }}</span> @enderror
</div>
