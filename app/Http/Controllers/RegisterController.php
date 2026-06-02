<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('portal.register');
    }

    public function register(RegisterRequest $request)
    {

        $validatedData = $request->validated();

    }
}
