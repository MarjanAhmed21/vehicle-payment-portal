<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // Get all customers (optional, useful later)
    public function index()
    {
        return response()->json(Customer::all());
    }

    // Store a new customer
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'postcode' => 'nullable|string|max:20',
        ]);

        // Create customer
        $customer = Customer::create([
            'name' => $request->name,
            'postcode' => $request->postcode,
        ]);

        // Return JSON response
        return response()->json($customer, 201);
    }
}
