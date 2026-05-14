<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    //
    public function index()
    {
        return inertia('Calculator');
    }

    public function calculate(Request $request)
    {
        $total = $request->length * 10; // пример

        session([
            'order_data' => [
                'length' => $request->length,
                'price' => $total
            ]
        ]);

        return back()->with('total', $total);
    }
}
