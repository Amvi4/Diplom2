<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReviewController extends Controller
{
    //
     public function index()
    {
        return Inertia::render('Reviews/Index', [
            'reviews' => Review::with('user')
                ->latest()
                ->get(),

            'authUser' => auth()->user()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|min:5',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'text' => $request->text,
            'rating' => $request->rating
        ]);

        return redirect('/reviews');
    }
}
