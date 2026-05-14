<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;


class OrderController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Order::with('user');

        // фильтр по email
        if ($request->email) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            });
        }

        // фильтр по статусу
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // фильтр по дате
        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $orders = $query->latest()->paginate(10);

        return inertia('Admin/Orders', [
            'orders' => $orders,
            'filters' => $request->only(['email', 'status', 'date'])
        ]);
    }
    public function updateStatus(Request $request, Order $order)
{
    $request->validate([
        'status' => 'required|in:new,in_progress,done'
    ]);

    $order->update([
        'status' => $request->status
    ]);

    return back();
}
}
