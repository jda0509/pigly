<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function ShowLoginForm()
    {
        return view('login');
    }

    public function store(LoginRequest $request)
    {
        $login = $request->only(['email','password']);

        if(Auth::attempt($login)){
            return redirect()->route('weight_logs.index');
        }

        return back();
    }
}
