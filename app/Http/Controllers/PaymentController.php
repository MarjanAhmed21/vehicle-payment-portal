<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // List all payments
    public function index()
    {
        return Payment::all();
    }

    // Create a new payment
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $payment = Payment::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return response()->json($payment, 201);
    }

    // Show a specific payment
    public function show(Payment $payment)
    {
        return $payment;
    }

    // Update payment status
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:pending,success,failed',
            'transaction_id' => 'nullable|string',
        ]);

        $payment->update($request->only('status', 'transaction_id'));

        return $payment;
    }

    // Delete a payment
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return response()->json(null, 204);
    }
}
