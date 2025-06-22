<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterStep1Request;
use App\Http\Requests\RegisterStep2Request;
use App\Models\User;
use App\Models\WeightTarget;
use App\Models\WeightLog;

class RegisterController extends Controller
{

    public function index()
    {
        return view('weight_logs');
    }

    public function ShowStep1()
    {
        return view('register.step1');
    }

    public function showStep2()
    {
        return view('register.step2');
    }

    public function storeStep1(RegisterStep1Request $request)
    {
        $step = $request->only(['name','email','password']);

        session([
            'register.name' => $step['name'],
            'register.email' => $step['email'],
            'register.password' => bcrypt($step['password'])
        ]);

        return view('register.step2');
    }

    public function storeStep2(RegisterStep2Request $request)
    {
        $step = $request->only(['weight','target_weight']);

        $user = User::create([
            'name' => session('register.name'),
            'email' => session('register.email'),
            'password' => session('register.password'),
        ]);

        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight
        ]);

        WeightLog::create([
            'user_id' => $user->id,
            'date' => now()->format('Y-m-d'),
            'weight' => $request->weight,
        ]);

        Auth::login($user);

        return redirect()->route('weight_logs');
    }
}
