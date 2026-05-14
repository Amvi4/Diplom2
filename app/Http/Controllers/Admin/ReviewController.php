<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Inertia\Inertia;

class ReviewController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('Admin/Reviews/Index', [
            'reviews' => Review::with('user')
                ->latest()
                ->get()
        ]);
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return back();
    }
}
