<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Category;
use App\Models\Enum\StatusGoal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        $goals = Goal::with('category')->get();
        return view('goals.index', compact('goals'));
    }

    public function create()
    {
        $categories = Category::all();
        $periods = ['week', 'month', 'year'];
        $statuses = StatusGoal::cases(); 
        return view('goals.create', compact('categories', 'periods', 'statuses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'period' => 'required|in:week,month,year',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Goal::create($validated);

        return redirect()->route('goals.index')->with('success', 'Meta criada com sucesso!');
    }

    public function edit(Goal $goal)
    {
        $categories = Category::all();
        $periods = ['week', 'month', 'year'];
        $statuses = StatusGoal::cases();
        return view('goals.edit', compact('goal', 'categories', 'periods', 'statuses'));
    }

    public function update(Request $request, Goal $goal)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'period' => 'required|in:week,month,year',
            'status' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $goal->update($validated);

        return redirect()->route('goals.index')->with('success', 'Meta atualizada com sucesso!');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('goals.index')->with('success', 'Meta excluída com sucesso!');
    }
}