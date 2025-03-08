<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;

class MyAccount extends Component
{
    use LivewireAlert; 

    public $username, $email;

    protected $rules = [
        'username' => 'required|min:3|max:255',
        'email' => 'required|email',
    ];

    public function mount()
    {
        $user = Auth::user();
        $this->username = $user->username;
        $this->email = $user->email;
    
        // Show alert if email is unverified
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
    
            // Check if email is being changed
            $emailChanged = $user->email !== $this->email;
    
            // Update username and email
            $user->username = $this->username;
            $user->email = $this->email;
    
            // If email has been changed, mark the email as unverified
            if ($emailChanged && $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail) {
                // Set email_verified_at to null to force the user to verify the new email
                $user->email_verified_at = null;
            }
    
            // Save the user
            $user->save();
    
            // Send email verification notification only if the email was changed
            if ($emailChanged && $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail) {
                $user->sendEmailVerificationNotification();
            }
    
            // Success alert based on email change
            if ($emailChanged) {
                $this->alert('info', 'Profile updated successfully! Please verify your new email address.', [
                    'position' => 'center',
                    'toast' => true,
                    'timer' => 3000,
                    'showConfirmButton' => false
                ]);
            } else {
                $this->alert('success', 'Profile updated successfully!', [
                    'position' => 'center',
                    'toast' => true,
                    'timer' => 3000,
                    'showConfirmButton' => false
                ]);
            }
    
            $this->dispatch('profileUpdated');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // MySQL duplicate entry error
                $this->alert('error', 'Username or email already exists!', [
                    'position' => 'center',
                    'toast' => true,
                    'timer' => 3000,
                    'showConfirmButton' => false
                ]);
            } else {
                $this->alert('error', 'Something went wrong!', [
                    'position' => 'center',
                    'toast' => true,
                    'timer' => 3000,
                    'showConfirmButton' => false
                ]);
            }
        }
    }
    
    
    public function render()
    {
        return view('livewire.my-account');
    }
}
