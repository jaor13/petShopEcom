<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProfileSettings extends Component
{
    use WithFileUploads;

    public $username;
    public $profile_picture;

    protected $listeners = ['profileUpdated' => 'refreshUser']; // Listen for updates

    public function mount()
    {
        $this->refreshUser();
    }

    public function refreshUser()
    {
        $user = Auth::user();
        $this->username = $user->username;
        $this->profile_picture = $user->profile_picture;
    }

    public function updatedProfilePicture()
    {
        $this->validate([
            'profile_picture' => 'image|max:2048',
        ]);

        $user = Auth::user();

        // Delete old profile picture if exists
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Store new profile picture
        $path = $this->profile_picture->store('profile_pictures', 'public');
        $user->profile_picture = $path;
        $user->save();

        // Emit event so other components update
        $this->dispatch('profileUpdated');
    }

    public function render()
    {
        return view('livewire.profile-settings', [
            'profile_picture_url' => $this->profile_picture
                ? asset('storage/' . $this->profile_picture)
                : asset('assets/images/default-1.gif'),
        ]);
    }
}
