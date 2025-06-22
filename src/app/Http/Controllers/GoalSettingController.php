<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightTarget;
use App\Http\Requests\GoalRequest;

class GoalSettingController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $target_weight = WeightTarget::where('user_id',$user_id)->latest()->first();
        return view('weight_logs.goal_setting', compact('target_weight'));
    }

    public function update(GoalRequest $request)
    {
        $user_id = Auth::id();

        $target = $request->validated();

        $target = WeightTarget::where('user_id', $user_id)->latest()->first();

        if($target){
            $target->update([
                'target_weight' => $request->target_weight
            ]);
        }

        return redirect()->route('weight_logs');
    }
}
