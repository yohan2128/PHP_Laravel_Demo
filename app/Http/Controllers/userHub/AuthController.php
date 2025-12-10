<?php

namespace App\Http\Controllers\userHub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function singUp(Request $request) {
        $incomingRequest = $request->validate([
            'name' => ['required', 'min:3', 'max:5', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:5']
        ], [
            'name.unique' => 'This username is already taken.',
            'email.unique' => 'This email is already registered.'
        ]);

        $incomingRequest['password'] = bcrypt($incomingRequest['password']);
        $user = User::create($incomingRequest);
        auth()->login($user);

        return redirect('/userHub');
    }

    public function signOut(Request $request){
        // Log the user out of the application
        auth()->logout();

        // Invalidate the session and regenerate the CSRF token to prevent session fixation
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/userHub');
    }

    public function signIn(Request $request){
        $incomingRequest = $request->validate([
            'emailUser' => 'required',
            'password' => 'required'
        ], [
            'emailUser.required' => 'Please provide your username or email.',
            'password.required' => 'Please provide your password.'
        ]);

        // Try login with username
        if(auth()->attempt(['name' => $incomingRequest['emailUser'], 'password' => $incomingRequest['password']])){
            $request->session()->regenerate();
            return redirect('/userHub');
        }

        // Try login with email
        if(auth()->attempt(['email' => $incomingRequest['emailUser'], 'password' => $incomingRequest['password']])){
            $request->session()->regenerate();
            return redirect('/userHub');
        }

        // If both fail, return back with error
        return back()->withErrors([
            'emailUser' => 'The provided credentials do not match our records.',
        ]);
    }

    public function passwordReset(Request $request){
        // 
        $incomingRequest = $request->validate([
            'email' => 'required|email'
        ],
        [
            'email.email' => 'Please provide a valid email address.'
        ]);

        return redirect('/userHub/showPassowrdResetLinkSent');
    }

    public function passwordUpdate(User $user, Request $request){
        //
        $incomingRequest = $request->validate([
            'password' => 'required|min:3|max:5|confirmed'
        ], [
            'password.confirmed' => 'The password confirmation does not match.'
        ]);
        $user->update([
            'password' => bcrypt($incomingRequest['password'])
        ]);

        return redirect('/userHub/signIn');
    }

    public function emailVerification(User $user, Request $request){
        //
        $incomingRequest = $request->validate([
            'verificationCode' => 'required'
        ], [
            'verificationCode.required' => 'Please provide the verification code sent to your email.'
        ]);
        $incomingRequest['is_verified'] = true;
        $user->update($incomingRequest);

        return redirect('/userHub/signIn');
    }
}
