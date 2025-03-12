<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealPlan;

class MealPlanController extends Controller
{
    /**
     * Display a listing of the meal plans.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $mealPlans = MealPlan::all();
        return response()->view('mealPlans.index', compact('mealPlans'));
    }

    /**
     * Show the form for creating a new meal plan.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return response()->view('mealPlans.create');
    }

    /**
     * Store a newly created meal plan in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        MealPlan::create($request->all());

        return redirect()->route('mealPlans.index')->with('success', 'Meal plan created successfully.');
    }

    /**
     * Display the specified meal plan.
     *
     * @param  \App\Models\MealPlan  $mealPlan
     * @return \Illuminate\Http\Response
     */
    public function show(MealPlan $mealPlan)
    {
        return view('mealPlans.show', compact('mealPlan'));
    }

    /**
     * Show the form for editing the specified meal plan.
     *
     * @param  \App\Models\MealPlan  $mealPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(MealPlan $mealPlan)
    {
        return view('mealPlans.edit', compact('mealPlan'));
    }

    /**
     * Update the specified meal plan in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MealPlan  $mealPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MealPlan $mealPlan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        $mealPlan->update($request->all());

        return redirect()->route('mealPlans.index')->with('success', 'Meal plan updated successfully.');
    }

    /**
     * Remove the specified meal plan from storage.
     *
     * @param  \App\Models\MealPlan  $mealPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(MealPlan $mealPlan)
    {
        $mealPlan->delete();

        return redirect()->route('mealPlans.index')->with('success', 'Meal plan deleted successfully.');
    }
}
