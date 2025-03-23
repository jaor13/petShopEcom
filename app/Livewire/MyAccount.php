<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MyAccount extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    
    public $username, $email, $dob, $gender, $cp_num;
    public $currentPassword, $newPassword, $newPasswordConfirmation;
    public $profile_picture;

    public $password; // Add this for delete confirmation
    protected $listeners = ['deleteConfirmed' => 'deleteUser', 'profileUpdated' => 'refreshUser'];

    public $isEditing = false;

    public function mount()
    {
        $this->refreshUser();
        $user = Auth::user();

        // Load user details
        $this->username = $user->username;
        $this->email = $user->email;
        $this->dob = $user->dob;
        $this->gender = $user->gender;
        $this->cp_num = $user->cp_num;
        $this->profile_picture = $user->profile_picture;

        $this->refreshUser();

        if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail()) {
            $this->alert('warning', 'Your email address is unverified. Please verify it from your email.', [
                'position' => 'center',
                'toast' => false,
                'timer' => null,
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
            ]);
        }
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

    public function enableEditing()
    {
        $this->isEditing = true;
    }

    public function disableEditing()
    {
        $this->isEditing = false;
    }

    public function cancelEditing()
    {
        $this->disableEditing();
    }


    public function updateProfile()
    {
        $this->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'cp_num' => 'nullable|string|max:20',
        ]);

        try {
            $user = Auth::user();
            $emailChanged = $user->email !== $this->email;

            $user->update([
                'username' => $this->username,
                'email' => $this->email,
                'dob' => $this->dob,
                'gender' => $this->gender,
                'cp_num' => $this->cp_num,
            ]);

            if ($emailChanged && $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail) {
                $user->email_verified_at = null;
            }

            $user->save();

            if ($emailChanged && $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail) {
                $user->sendEmailVerificationNotification();
            }

            $this->alert('success', 'Profile updated successfully!', [
                'position' => 'center',
                'toast' => true,
                'timer' => 3000,
                'showConfirmButton' => false
            ]);

            $this->disableEditing();
            $this->dispatch('profileUpdated');
        } catch (\Exception $e) {
            $this->alert('error', 'Something went wrong!', [
                'position' => 'center',
                'toast' => true,
                'timer' => 3000,
                'showConfirmButton' => false
            ]);
        }
    }

    public function updatePassword()
    {
        $this->validate([
            'currentPassword' => ['required', 'current_password'],
            'newPassword' => ['required', 'min:8', 'same:newPasswordConfirmation'],
            'newPasswordConfirmation' => ['required'],
        ]);

        try {
            // Update the password
            $user = Auth::user();
            $user->update([
                'password' => Hash::make($this->newPassword),
            ]);

            // Reset fields
            $this->reset('currentPassword', 'newPassword', 'newPasswordConfirmation');

            // Show success alert
            $this->alert('success', 'Password updated successfully!', [
                'position' => 'center',
                'toast' => true,
                'timer' => 3000,
                'showConfirmButton' => false
            ]);

        } catch (\Exception $e) {
            // Show error alert if something goes wrong
            $this->alert('error', 'Something went wrong!', [
                'position' => 'center',
                'toast' => true,
                'timer' => 3000,
                'showConfirmButton' => false
            ]);
        }
    }

    public function sendVerificationEmail()
    {
        $user = Auth::user();

        if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();

            $this->alert('success', 'A new verification link has been sent to your email.', [
                'position' => 'center',
                'toast' => true,
                'timer' => 3000,
                'showConfirmButton' => false
            ]);
        }
    }


    public function confirmDelete()
    {
        $this->validate([
            'password' => ['required', 'string'],
        ]);

        if (!Hash::check($this->password, Auth::user()->password)) {
            $this->addError('password', 'The password is incorrect.');
            return;
        }

        // Show confirmation alert
        $this->alert('warning', 'Are you sure you want to delete your account?', [
            'position' => 'center',
            'text' => "This action cannot be undone!",
            'toast' => false,
            'timer' => null,
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes, delete my account',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'deleteConfirmed',
        ]);
    }

    public function deleteUser()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }

    public function render()
    {
        return view('livewire.my-account', [
            'profile_picture_url' => $this->profile_picture
                ? asset('storage/' . $this->profile_picture)
                : asset('assets/images/default-profile.png'),
        ]);
    }

}
