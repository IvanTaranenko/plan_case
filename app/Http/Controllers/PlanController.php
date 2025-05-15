<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        $user = auth()->user();

        return view('pages.plans.index', compact('plans', 'user'));
    }

    public function subscribe(Request $request, Plan $plan)
    {
        $user = Auth::user();

        if ($user) {
            $user->plan_id = $plan->id;
            $user->save();

            return redirect()->route('plans.index')->with('success', 'Your plan has been updated.');
        }

        return redirect()->route('login');
    }
}
