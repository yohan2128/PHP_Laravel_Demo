<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $inreq = $request->validate([
            'name' => ['required', 'min:3', 'max:5', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:5']
        ], [
            'name.unique' => 'This username is already taken.',
            'email.unique' => 'This email is already registered.'
        ]);

        $inreq['password'] = bcrypt($inreq['password']);
        $user = User::create($inreq);
        auth()->login($user);

        return redirect('/CRUD');
    }

    public function logout(Request $request){
        // Log the user out of the application
        auth()->logout();

        // Invalidate the session and regenerate the CSRF token to prevent session fixation
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/CRUD');
    }

    public function login(Request $request){
        $inreq = $request->validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);

        if(auth()->attempt(['name' => $inreq['loginName'], 'password' => $inreq['loginPassword']])){
            $request->session()->regenerate();
        }

        return redirect('/CRUD');
    }
}
