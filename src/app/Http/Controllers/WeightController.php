<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightTarget;
use App\Models\WeightLog;
use App\Http\Requests\WeightRequest;
use Illuminate\Support\Facades\Auth;

class WeightController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $target_weight = WeightTarget::where('user_id',$user_id)->latest()->first();
        $current_log = WeightLog::where('user_id',$user_id)->latest()->first();

        $current_weight = $current_log ? $current_log->weight : null;
        $diff = $current_weight && $target_weight ? $target_weight->target_weight - $current_weight : null;

        $weight_logs = WeightLog::where('user_id',Auth::id())->paginate(8);
        return view('weight_logs', compact('target_weight', 'current_weight','weight_logs','diff'));
    }

    public function create(){
        return view('weight_logs.create');
    }


    public function store(WeightRequest $request)
    {
        $data = $request->validated();

        WeightLog::create([
            'user_id' => Auth::id(),
            'date' => $data['date'],
            'weight' => $data['weight'],
            'calories' => $data['calories'],
            'exercise_time' => $data['exercise_time'],
            'exercise_content' => $data['exercise_content'],
        ]);

        return redirect()->route('weight_logs');
    }

    public function show($id)
    {
        $user_id = Auth::id();

        $weight_log = WeightLog::where('id', $id)
                                ->where('user_id', $user_id)
                                ->firstOrFail();

        return view('weight_logs.update',compact('weight_log'));
    }

    public function update(WeightRequest $request, $id)
    {
        $date = $request->validated();

        $log = WeightLog::findOrFail($id);
        $log->update([
            'date' => $date['date'],
            'weight' => $date['weight'],
            'calories' => $date['calories'],
            'exercise_time' => $date['exercise_time'],
            'exercise_content' => $date['exercise_content']
        ]);

        return redirect()->route('weight_logs');

    }

    public function destroy(Request $request, $id)
    {
        WeightLog::find($request->id)->delete();
        return redirect()->route('weight_logs');
    }
}

