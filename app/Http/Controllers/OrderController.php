<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function create()
    {
        return inertia('Order/Create', [
            'data' => session('order_data'),
            'user' => auth()->user()
        ]);
    }

    public function store(Request $request)
    {
            $price = $this->calculatePrice(
            $request->type,
            $request->length,
            $request->thickness,
            $request->size
        );

        Order::create([
            'user_id' => auth()->id(),
            'service_type' => $request->type,
            'length' => $request->length,
            'thickness' => $request->thickness,
            'size' => $request->size,   
            'price' => $price,
            'comment' => $request->comment
        ]);

        session()->forget('order_data');

        return redirect('/profile');
    }
    public function fromCalculator(Request $request)
{
    if (!auth()->check()) {

    session([
        'order_data' => [
            'type' => $request->type,
            'length' => $request->length,
            'thickness' => $request->thickness,
            'size' => $request->size,
            'price' => $price,
        ]
    ]);

    return redirect('/login');
}
    $type = $request->type;
    $length = $request->length;
    $thickness = $request->thickness;
    $size = $request->size;

    // базовые ставки
    $baseRates = [
        'mig' => 10,
        'tig' => 15,
        'mma' => 8,
    ];

    // коэффициент толщины
    if ($thickness <= 2) $tCoef = 1;
    elseif ($thickness <= 5) $tCoef = 1.3;
    elseif ($thickness <= 10) $tCoef = 1.6;
    else $tCoef = 2;

    // коэффициент размера
    $sizeCoef = [
        'small' => 1,
        'medium' => 1.2,
        'large' => 1.5,
    ];

    $price = round(
        $length *
        $baseRates[$type] *
        $tCoef *
        $sizeCoef[$size]
    );

    session([
        'order_data' => [
            'type' => $type,
            'length' => $length,
            'thickness' => $thickness,
            'size' => $size,
            'price' => $price
        ]
    ]);

    return redirect()->route('order.create');
}
    private function calculatePrice($type, $length, $thickness, $size)
    {
        $baseRates = [
            'mig' => 10,
            'tig' => 15,
            'mma' => 8,
        ];

        if ($thickness <= 2) $tCoef = 1;
        elseif ($thickness <= 5) $tCoef = 1.3;
        elseif ($thickness <= 10) $tCoef = 1.6;
        else $tCoef = 2;

        $sizeCoef = [
            'small' => 1,
            'medium' => 1.2,
            'large' => 1.5,
        ];

        return round($length * $baseRates[$type] * $tCoef * $sizeCoef[$size]);
    }
    
}
