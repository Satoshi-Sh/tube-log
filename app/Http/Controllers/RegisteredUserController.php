<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(Request $request){
        $userAttributes = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required','confirmed',Password::min(6)]
        ]);

        $user = User::create($userAttributes);

        Auth::login($user);
        return redirect('/');
    }

}
