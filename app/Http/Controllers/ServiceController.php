<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function select($id)
    {
        $service = Service::findOrFail($id);

        session([
            'order_data' => [
                'service_name' => $service->name,
                'price' => $service->price
            ]
        ]);

        return redirect()->route('order.create');
    }
}
