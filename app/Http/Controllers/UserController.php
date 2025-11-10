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
        ]);

        $inreq['password'] = bcrypt($inreq['password']);
        $user = User::create($inreq);
        auth()->guard()->login($user);

        return redirect('/home');
    }

    public function logout(){
        auth()->guard()->logout();
        return redirect('/home');
    }

    public function login(Request $request){
        $inreq = $request->validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);

        if(auth()->guard()->attempt(['name' => $inreq['loginName'], 'password' => $inreq['loginPassword']])){
            $request->session()->regenerate();
        }

        return redirect('/home');
    }
}
