<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{

    // registration view
    public function create() {
        return view('registration');
    }


    public function store(Request $request) {
        
        $validated = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'max:255',
                'min:3',
                Rule::unique('users','email')
            ],            
            'password' => [
                'required',
                Password::min(5)->numbers()
            ],
        ]);


        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return redirect('/login')->with('status', 'User Registration completed');

    }

}
