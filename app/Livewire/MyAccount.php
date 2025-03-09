<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class MyAccount extends Component
{
    use LivewireAlert;

    public $username, $email;
    public $currentPassword, $newPassword, $newPasswordConfirmation;

    
    public $password; // Add this for delete confirmation

    protected $listeners = ['deleteConfirmed' => 'deleteUser'];
  

    public function mount()
    {
        $user = Auth::user();
        $this->username = $user->username;
        $this->email = $user->email;

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

    public function updateProfile()
    {
        $this->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        try {
            $user = Auth::user();
            $emailChanged = $user->email !== $this->email;

            $user->username = $this->username;
            $user->email = $this->email;

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
            'text'=> "This action cannot be undone!",
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
        return view('livewire.my-account');
    }
}
