<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExpensesCategoryController;
use App\Models\FinancialExpense;

class FinancialExpenseController extends Controller

{
    // protected $financialExpense;

    // public function __construct(FinancialExpense $financialExpense)
    // {
    //     $this->financialExpense = $financialExpense;
    // }

    public function index(Travel $travel)
    {
        $expenses = $travel->financialExpenses()->get();
        $categories = ExpensesCategoryController::getUserExpensesCategories();
        return view('financial_expenses.index', ['expenses' => $expenses, 'categories' => $categories, 'travel' => $travel]);
    }

    public function create(Travel $travel)
    {

        $categories = ExpensesCategoryController::getUserExpensesCategories();
        return view('financial_expenses.create', ['categories' => $categories, 'travel' => $travel]);
    }
    public function store(Request $request, Travel $travel)
    {
        $formFields = $request->validate([
            'expenses_categories_id' => 'required',
            'amount' => 'required',
            'description' => 'required',

        ]);

        $formFields['user_id'] = Auth::id();
        $formFields['travel_id'] = $travel->id;



        FinancialExpense::create($formFields);

        return redirect("/travels/$travel->id/financial-expenses")->with('message', 'Expenses added successfully!');
    }

    public function destroy(Travel $travel, FinancialExpense $financialExpense)
    {
        if ($financialExpense->user_id != Auth::id()) {
            abort(403, 'Unauthorized action');
        }

        $financialExpense->delete();
        return redirect("/travels/$travel->id/financial-expenses")->with('message', 'Expense deleted successfully');
    }
}
