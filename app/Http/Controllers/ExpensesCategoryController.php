<?php

namespace App\Http\Controllers;

use App\Models\ExpensesCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesCategoryController extends Controller
{

    public static function getUserExpensesCategories()
    {
        $categories = Auth::user()->financialCategories()->get();

        return $categories;
    }

    public function index()
    {
        $categories = Auth::user()->financialCategories()->get();

        return view('expenses_categories.index', ['categories' => $categories]);
    }

    public function create()
    {

        return view('expenses_categories.create');
    }
    public function store(Request $request)
    {

        $formFields = $request->validate([
            'category' => 'required',

        ]);

        $formFields['user_id'] = Auth::id();


        ExpensesCategory::create($formFields);
        return redirect('/travels/financial-expenses/categories')->with('message', 'Expenses category created successfully!');
    }

    public function destroy(ExpensesCategory $expensesCategory)
    {

        if ($expensesCategory->user_id != Auth::id()) {
            abort(403, 'Unauthorized action');
        }

        $expensesCategory->delete();
        return redirect('/travels/financial-expenses/categories')->with('message', 'Category deleted successfully');
    }

    public function edit(ExpensesCategory $expensesCategory)
    {

        return view('expenses_categories.edit', ['category' => $expensesCategory]);
    }

    public function update(ExpensesCategory $expensesCategory, Request $request)
    {
        if ($expensesCategory->user_id != Auth::id()) {
            abort(403, 'Unauthorized action');
        }

        $formFields = $request->validate([
            'category' => 'required'
        ]);


        $expensesCategory->update($formFields);

        return redirect('/travels/financial-expenses/categories')->with('message', 'Category updated successfully');
    }
}
