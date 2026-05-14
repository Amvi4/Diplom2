<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Feedback;
use Inertia\Inertia;

class FeedbackController extends Controller
{
    //
     public function index()
    {
        return Inertia::render('Admin/Index', [
            'feedbacks' => Feedback::latest()->get()
        ]);
    }
}
