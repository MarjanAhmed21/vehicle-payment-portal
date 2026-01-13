<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Customer;

class PaymentController extends Controller
{
    // Get all payments (optional)
    public function index()
    {
        return response()->json(Payment::with('customer')->get());
    }

    // Store new payment
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'nullable|string|max:50',
        ]);

        $payment = Payment::create([
            'customer_id' => $request->customer_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ]);

        return response()->json($payment, 201);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'amount' => 'required|numeric|min:0',
        'payment_method' => 'nullable|string|max:50',
    ]);

    $payment = Payment::findOrFail($id);
    $payment->update([
        'amount' => $request->amount,
        'payment_method' => $request->payment_method,
    ]);

    return response()->json($payment, 200);
}

    // Delete payment   
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json(['message' => 'Payment deleted'], 200);
    }
}
