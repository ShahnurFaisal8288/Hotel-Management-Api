<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    //expense
    public function expense() {
        $data = array();
        $data['active_menu'] = 'Expense';
        $data['page_title'] = 'Expense Add';
        $category = Category::all();
    
        if(request()->isMethod('post')) {
            $expense = Expense::create([
                'totalAmount' => request('totalAmount'),
            ]);
    
            $categoryIds = request()->input('category_id');
            $quantities = request()->input('quantity');
            $amounts = request()->input('amount');
            $details = request()->input('details');
    
            // Validate that these arrays are not null
            if (is_array($categoryIds) && is_array($quantities) && is_array($amounts) && is_array($details)) {
                foreach ($categoryIds as $index => $categoryId) {
                    $quantity = $quantities[$index];
                    $amount = $amounts[$index];
                    $detail = $details[$index];
    
                    $expense->categories()->attach($categoryId, [
                        'quantity' => $quantity,
                        'amount' => $amount,
                        'details' => $detail,
                    ]);
                }
                return back()->with('success', 'Expense Created Successfully');
            } else {
                return back()->with('error', 'Failed to create expense, please fill all fields.');
            }
        }
    
        return view('backend.expense.addExpense', compact('data', 'category'));
    }
    //expenseList
    public function expenseList(){
        $data = array();
        $data['active_menu'] = 'expenseList';
        $data['page_title'] = 'Expense List';
        $expenses = Expense::with('categories')->get();
        // dd($expenses);
        return view('backend.expense.expenseList', compact('expenses','data'));
    }
}
