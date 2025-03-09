<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Livewire; 

class CustomProfileController extends Controller
{
    /**
     * Show the User Profile page with Edit, Update, and Delete actions.
     */
    public function show(Request $request)
    {
        return view('UserProfile', [
            'user' => $request->user(),
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
    
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);
    
        $user->username = $request->input('username');
        $user->email = $request->input('email');
    
        if ($user->isDirty()) {
            $user->save();
            Livewire::emit('triggerAlert', 'Profile updated successfully.', 'success');
            return back();
        }
    
        Livewire::emit('triggerAlert', 'No changes were made.', 'error');
        return back();
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Account deleted successfully!');
    }
}
