<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WorkerController extends Controller
{
    //
    public function index()
    {
        $workers = Worker::latest()->get();

        return Inertia::render('Workers/Index', [
            'workers' => $workers
        ]);
    }

    public function show($id)
    {
        $worker = Worker::with('works')->findOrFail($id);

        return Inertia::render('Workers/Show', [
            'worker' => $worker
        ]);
        $worker = Worker::with('works')
        ->findOrFail($id);
    }
}
