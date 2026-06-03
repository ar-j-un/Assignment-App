<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function view()
    {
        return view('portal.register');
    }

    public function register(RegisterRequest $request)
    {

        $validatedData = $request->validated();
        $user = User::create($validatedData);
        Auth::login($user);

        return redirect('/')->with('success', 'Account created successfully! Welcome to the portal.');

    }
}
