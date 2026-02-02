<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('site.dashboard');
        }

        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        Auth::login($user);

        return redirect()->route('site.dashboard');
    }
}
